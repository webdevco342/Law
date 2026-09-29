// Local development only. Production uses ordinary WordPress hosting.
import { runCLI } from '../tmp/qa/node_modules/@wp-playground/cli/index.js';
import fs from 'node:fs/promises';
import path from 'node:path';
import crypto from 'node:crypto';
import readline from 'node:readline';
const root=path.resolve('.');
const credentialFile=path.join(root,'tmp/upgrade/local-admin.json');
let credentials;
try{credentials=JSON.parse(await fs.readFile(credentialFile,'utf8'));}catch{
 credentials={url:'http://127.0.0.1:9400/wp-admin/',username:'qav_editor',password:crypto.randomBytes(24).toString('base64url')};
 await fs.writeFile(credentialFile,JSON.stringify(credentials,null,2),{mode:0o600});
}
const bootstrap=`<?php
require '/wordpress/wp-load.php'; require_once ABSPATH.'wp-admin/includes/plugin.php';
if(!is_plugin_active('qav-publishing/qav-publishing.php'))activate_plugin('qav-publishing/qav-publishing.php');
if(get_stylesheet()!=='qav-advocate')switch_theme('qav-advocate');
if(!get_option('qav_local_initialized')){
  $id=wp_create_user('${credentials.username}','${credentials.password}','local-editor@example.invalid');
  if(!is_wp_error($id)){(new WP_User($id))->set_role('administrator');wp_update_user(['ID'=>$id,'display_name'=>'Qurat-ul-Ain Viirk']);}
  require_once ABSPATH.'wp-admin/includes/user.php';$default=get_user_by('login','admin');if($default && !is_wp_error($id))wp_delete_user($default->ID,$id);
  foreach(get_posts(['post_type'=>['post','page'],'post_status'=>'any','numberposts'=>-1]) as $p){if(in_array($p->post_name,['hello-world','sample-page'],true))wp_delete_post($p->ID,true);}
  update_option('blogname','Qurat-ul-Ain Viirk');update_option('blogdescription','Advocate High Court');update_option('blog_public',0);update_option('timezone_string','Asia/Karachi');update_option('default_comment_status','closed');update_option('permalink_structure','/insights/%postname%/');update_option('qav_local_initialized',1);flush_rewrite_rules();
}
echo 'Local WordPress profile ready.';`;
const server=await runCLI({command:'server',port:9400,php:'8.3',workers:1,login:false,verbosity:'normal',wordpressInstallMode:'install-from-existing-files-if-needed',
 'mount-before-install':[{hostPath:path.join(root,'tmp/upgrade/wp/wordpress'),vfsPath:'/wordpress'}],
 mount:[{hostPath:path.join(root,'wordpress/qav-advocate'),vfsPath:'/wordpress/wp-content/themes/qav-advocate'},{hostPath:path.join(root,'wordpress/qav-publishing'),vfsPath:'/wordpress/wp-content/plugins/qav-publishing'}],
 blueprint:{steps:[{step:'runPHP',code:bootstrap}]},'define-bool':{WP_DEBUG:true,WP_DEBUG_LOG:true,WP_DEBUG_DISPLAY:false,DISALLOW_FILE_EDIT:true}
});
const wpConfig=path.join(root,'tmp/upgrade/wp/wordpress/wp-config.php');
const configText=await fs.readFile(wpConfig,'utf8');
if(configText.includes('put your unique phrase here'))await fs.writeFile(wpConfig,configText.replaceAll('put your unique phrase here',()=>crypto.randomBytes(48).toString('hex')));
console.log('CMS preview: http://127.0.0.1:9400 — local credentials saved in tmp/upgrade/local-admin.json (excluded from delivery).');
// A local stdin bridge for PHP validation; there is no public execution endpoint.
const rl=readline.createInterface({input:process.stdin});
rl.on('line',async line=>{
 try{const msg=JSON.parse(line);if(msg.phpFile){const code=await fs.readFile(path.resolve(msg.phpFile),'utf8');const result=await server.playground.run({code});console.log(JSON.stringify({id:msg.id,output:result.text,errors:result.errors,exitCode:result.exitCode}));}}
 catch(error){console.log(JSON.stringify({error:error.message}));}
});

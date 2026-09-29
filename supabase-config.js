const SUPABASE_URL = "https://houfjfcyziitahrnzndz.supabase.co";
const SUPABASE_KEY = "sb_publishable_1oogWbSmb7z4Bh7-ZKVhFQ_NSllOUx2"; // <-- VERY IMPORTANT: Replace this with your actual Supabase Anon Key

async function getSiteData() {
  if (SUPABASE_KEY === "PASTE_YOUR_ANON_KEY_HERE") {
    console.warn("Supabase Key is missing! Falling back to local defaults.");
    return null;
  }
  
  try {
    const res = await fetch(`${SUPABASE_URL}/rest/v1/site_settings?id=eq.1&select=content`, {
      headers: {
        'apikey': SUPABASE_KEY,
        'Authorization': `Bearer ${SUPABASE_KEY}`
      }
    });
    const data = await res.json();
    return data[0]?.content || null;
  } catch (error) {
    console.error("Error fetching from Supabase:", error);
    return null;
  }
}

async function saveSiteData(content) {
  if (SUPABASE_KEY === "PASTE_YOUR_ANON_KEY_HERE") {
    alert("You must paste your Supabase Anon Key in supabase-config.js before saving!");
    return false;
  }
  
  try {
    const res = await fetch(`${SUPABASE_URL}/rest/v1/site_settings?id=eq.1`, {
      method: 'PATCH',
      headers: {
        'apikey': SUPABASE_KEY,
        'Authorization': `Bearer ${SUPABASE_KEY}`,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ content })
    });
    
    if (res.ok) return true;
    
    // If we got here, maybe the row doesn't exist yet, try to POST it
    await fetch(`${SUPABASE_URL}/rest/v1/site_settings`, {
      method: 'POST',
      headers: {
        'apikey': SUPABASE_KEY,
        'Authorization': `Bearer ${SUPABASE_KEY}`,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ id: 1, content })
    });
    return true;
  } catch (error) {
    console.error("Error saving to Supabase:", error);
    return false;
  }
}

async function uploadFileToSupabase(file) {
  if (SUPABASE_KEY === "PASTE_YOUR_ANON_KEY_HERE") {
    alert("Supabase key missing!");
    return null;
  }
  
  const fileName = `${Date.now()}_${file.name.replace(/[^a-zA-Z0-9.\-_]/g, '')}`;
  try {
    const res = await fetch(`${SUPABASE_URL}/storage/v1/object/media/${fileName}`, {
      method: 'POST',
      headers: {
        'apikey': SUPABASE_KEY,
        'Authorization': `Bearer ${SUPABASE_KEY}`,
        'Content-Type': file.type
      },
      body: file
    });
    
    if (res.ok) {
      return `${SUPABASE_URL}/storage/v1/object/public/media/${fileName}`;
    } else {
      const errorText = await res.text();
      console.error("Upload failed:", errorText);
      alert("Upload failed! Make sure you created a public bucket named 'media'.");
      return null;
    }
  } catch (error) {
    console.error("Error uploading to Supabase:", error);
    return null;
  }
}

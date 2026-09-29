$ErrorActionPreference = 'Stop'
$workspace = (Resolve-Path (Join-Path $PSScriptRoot '..')).Path
$delivery = Join-Path $workspace 'dist'
$staging = Join-Path $workspace 'tmp\upgrade\handover'
New-Item -ItemType Directory -Path $delivery, $staging -Force | Out-Null
Add-Type -AssemblyName System.IO.Compression
function Write-PortableZip($sourceDirectory, $destination, $prefix) {
    $sourcePath = (Resolve-Path -LiteralPath $sourceDirectory).Path
    $stream = [System.IO.File]::Create($destination)
    $archive = New-Object System.IO.Compression.ZipArchive($stream, [System.IO.Compression.ZipArchiveMode]::Create)
    try {
        foreach ($file in Get-ChildItem -LiteralPath $sourcePath -Recurse -File) {
            $relativeName = $file.FullName.Substring($sourcePath.Length).TrimStart([char[]]@('\','/')).Replace('\','/')
            $entry = $archive.CreateEntry($prefix + $relativeName, [System.IO.Compression.CompressionLevel]::Optimal)
            $inputStream = [System.IO.File]::OpenRead($file.FullName)
            $outputStream = $entry.Open()
            try { $inputStream.CopyTo($outputStream) } finally { $inputStream.Dispose(); $outputStream.Dispose() }
        }
    } finally { $archive.Dispose(); $stream.Dispose() }
}
Write-PortableZip (Join-Path $workspace 'wordpress\qav-publishing') (Join-Path $delivery 'qav-publishing.zip') 'qav-publishing/'
Write-PortableZip (Join-Path $workspace 'wordpress\qav-advocate') (Join-Path $delivery 'qav-advocate.zip') 'qav-advocate/'
foreach ($name in @('index.html','insights.html','media.html','privacy.html','style.css','upgrade.css','script.js','README.md','CLIENT-PUBLISHING-GUIDE.md','CONTENT-SOURCES.md','QA.md')) {
    Copy-Item -LiteralPath (Join-Path $workspace $name) -Destination (Join-Path $staging $name) -Force
}
Copy-Item -LiteralPath (Join-Path $workspace 'assets') -Destination $staging -Recurse -Force
Copy-Item -LiteralPath (Join-Path $workspace 'wordpress') -Destination $staging -Recurse -Force
New-Item -ItemType Directory -Path (Join-Path $staging 'install'), (Join-Path $staging 'tools') -Force | Out-Null
foreach ($name in @('qav-publishing.zip','qav-advocate.zip')) {
    Copy-Item -LiteralPath (Join-Path $delivery $name) -Destination (Join-Path $staging 'install') -Force
}
foreach ($name in @('serve.mjs','build-theme.mjs','prepare-portrait.mjs','start-wordpress.mjs')) {
    Copy-Item -LiteralPath (Join-Path $workspace ('tools\'+$name)) -Destination (Join-Path $staging 'tools') -Force
}
Write-PortableZip $staging (Join-Path $delivery 'Qurat-ul-Ain-Viirik-Complete-Website.zip') ''
Get-ChildItem -LiteralPath $delivery -File | Select-Object Name, Length

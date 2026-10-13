# Dubai Plaza — one-shot local setup (Windows / Laragon)
$ErrorActionPreference = "Stop"
$root = Split-Path -Parent $PSScriptRoot
$backend = Join-Path $root "backend"
$php = "C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe"
$composer = "C:\laragon\bin\composer\composer.phar"

if (-not (Test-Path $php)) { $php = "php" }
if (-not (Test-Path $composer)) { throw "Composer not found at $composer" }

Set-Location $backend

if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" ".env"
    Write-Host "Created .env from .env.example"
}

& $php $composer install --no-interaction --prefer-dist
& $php artisan key:generate --force
& $php artisan migrate:fresh --seed --force

npm install
npm run build

Write-Host ""
Write-Host "Done. Start backend:"
Write-Host "  cd backend"
Write-Host "  $php artisan serve"
Write-Host ""
Write-Host "Login: owner@dubaiplaza.test / password"
Write-Host "Wireframe: open $root\index.html in browser"

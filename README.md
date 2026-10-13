# Dubai Plaza Stock System (V1)

Interactive **wireframe / demo** for a second-hand laptop shop: inventory, sales, customer ledger (Udhaar), accounts, Excel import, and receipt QR.

## Deploy

Static site — deploy the repo root to [Vercel](https://vercel.com) (see `vercel.json`). No build step.

Local preview: open `index.html` in a browser, or:

```bash
npx serve .
```

## Contents

| Path | Description |
|------|-------------|
| `backend/` | **Laravel app** — login, roles, laptop & accessory inventory |
| `index.html` | Full Zoho-style app wireframe with navigation |
| `sample-inventory-import.csv` | Sample lot import file |
| `INVENTORY_IMPORT_README.txt` | Column mapping guide |
| `docs/` | Product report and additional wireframe HTML |

## Laravel backend (local)

See `backend/README.md`. **One command (Windows / Laragon):**

```powershell
.\scripts\setup-all.ps1
cd backend
C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan serve
```

Or manual: `composer install` → copy `.env.example` → `artisan key:generate` → `migrate:fresh --seed` → `npm install && npm run build`.

Demo login: `owner@dubaiplaza.test` / `password`

**Laragon path (full clone):** `C:\laragon\www\dubaiplaza` — document root for Apache: `backend/public`

## Production stack

Laravel + PostgreSQL + Bootstrap (wireframe remains static demo on Vercel).

## License

Private — Dubai Plaza / client project.

Dubai Plaza — Inventory Excel/CSV import sample
=============================================

Use file: sample-inventory-import.csv
(Open in Excel → Save As .xlsx if you prefer .xlsx)

ONE ROW = ONE PHYSICAL LAPTOP (serialized unit).

Required column (must map on step 2):
  Model          → Item name

Recommended columns (auto-detected if headers match):
  CPU            → CPU (spec)
  RAM            → RAM
  Storage        → Storage  (SSD/HDD size)
  Cost           → Cost price
  Rate           → Selling rate  (use Sale_Price or MRP if you rename)
  Serial         → Serial

Optional (auto-detected when headers match):
  Brand          → Brand (prepended to item name if needed)
  Condition      → Notes / condition
  Supplier_Lot   → Lot / container

Tips (like Zoho Inventory templates):
  • Do not merge cells; row 1 = headers only.
  • No blank rows in the middle of data.
  • Cost = your purchase cost; Rate = asking/selling price.
  • Same Supplier_Lot = same container/shipment (production app links to Lots).

You can add/remove columns; on "Map columns" you choose what each Excel column means.

Demo app: Import Excel → Upload → Map → Preview → Import into stock.

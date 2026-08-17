# Product

Каталог на продукти с име, описание и мярна единица. Споделен от склад, доставки, поръчки и производство.

## Функционалност

- CRUD на продукти
- Търсене по име и мярка
- Мерни единици: кг, литър, брой

## Интеграция в системата

Copy-in модул: файловете се копират в хоста под `App\`.

- Пътища: `src/Controller|Entity|Enum|Form|Repository/Product/`, `templates/product/`, `translations/product.*.yaml`, `config/roles/product.yaml`
- Меню: Продукти (`product_list`) при `ROLE_PRODUCT_VIEW`
- Роли: `ROLE_PRODUCT_{VIEW,CREATE,EDIT,DELETE}`
- Маршрути: `/products`

Използва се от **warehouse**, **delivery**, **order** и **production**.

## Структура

- `ProductController`
- Ентитет: `Product` (name, description, measure)
- Enum: `ProductMeasure` (`KG`, `LITER`, `PIECE`)
- Форми: продукт и търсене

## Зависимости

- **erp-core**

## Документация

- [docs/product/README.md](docs/product/README.md)
- [docs/product/installation-guide.md](docs/product/installation-guide.md)
- [docs/product/quick-start.md](docs/product/quick-start.md)

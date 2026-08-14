# Product Module

## Overview

The Product module provides functionality for managing products in the ERP system. It allows users to create, edit, and manage products with basic information including name, description, and measure unit.

## Features

- **Product Management**: Create, edit, and delete products
- **Search Functionality**: Search products by name and measure unit
- **Measure Units**: Support for kg, liters, and pieces
- **Multilingual Support**: Full support for Bulgarian and English languages

## Entity Structure

### Product Entity

The Product entity contains the following fields:

- **id** (int): Primary key
- **name** (string, 255 chars): Product name
- **description** (text, nullable): Product description
- **measure** (enum): Measure unit (kg, l, br)

### ProductMeasure Enum

Available measure units:
- `KG` - Kilograms
- `LITER` - Liters  
- `PIECE` - Pieces

## Installation

The Product module is automatically installed with the system. No additional configuration is required.

## Usage

### Accessing Products

Navigate to the "Products" menu item in the left sidebar to access the product management interface.

### Creating a Product

1. Click the "New" button on the products list page
2. Fill in the required fields:
   - **Name**: Product name (required, max 255 characters)
   - **Description**: Product description (optional)
   - **Measure Unit**: Select from kg, l, or br (required)
3. Click "Save" to create the product

### Editing a Product

1. Click the edit icon next to any product in the list
2. Modify the desired fields
3. Click "Save" to update the product

### Searching Products

Use the search form to filter products by:
- **Name**: Search by product name
- **Measure Unit**: Filter by specific measure unit

## API Endpoints

The module provides the following REST endpoints:

- `GET /products` - List all products
- `GET /products/create` - Show create form
- `POST /products/create` - Create new product
- `GET /products/{id}/edit` - Show edit form
- `POST /products/{id}/edit` - Update product
- `POST /products/deletes` - Delete multiple products

## Database Schema

```sql
CREATE TABLE product (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description LONGTEXT DEFAULT NULL,
    measure VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB;
```

## Translation Keys

### English (product.en.yaml)
- `leftMenu.products`: 'Products'
- `createProductTitle`: 'Create product'
- `editProductTitle`: 'Edit product'
- `name`: 'Name'
- `description`: 'Description'
- `measure`: 'Measure unit'
- `measure.kg`: 'kg'
- `measure.liter`: 'l'
- `measure.piece`: 'br'
- `measure.all`: 'All measures'

### Bulgarian (product.bg.yaml)
- `leftMenu.products`: 'Продукти'
- `createProductTitle`: 'Създаване на продукт'
- `editProductTitle`: 'Редактиране на продукт'
- `name`: 'Име'
- `description`: 'Описание'
- `measure`: 'Мярна единица'
- `measure.kg`: 'кг'
- `measure.liter`: 'л'
- `measure.piece`: 'бр'
- `measure.all`: 'Всички мерки'

## Dependencies

The Product module has no external dependencies and is self-contained within the ERP system.

## Future Enhancements

Potential future features:
- Product categories
- Product images
- Product variants
- Inventory tracking
- Price management
- Integration with invoice module 
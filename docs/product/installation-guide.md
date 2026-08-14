# Product Module Installation Guide

## Prerequisites

- Symfony 6.x application
- Doctrine ORM configured
- Database connection established

## Installation Steps

### 1. Database Migration

The Product module requires a database table to be created. Run the following command to create and execute the migration:

```bash
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### 2. Clear Cache

After installation, clear the application cache:

```bash
php bin/console cache:clear
```

### 3. Verify Installation

Check that the routes are properly registered:

```bash
php bin/console debug:router | grep product
```

You should see the following routes:
- `product_list`
- `product_create`
- `product_edit`
- `product_deletes`

## Configuration

No additional configuration is required. The Product module is automatically integrated into the system.

## Menu Integration

The Product module is automatically added to the main navigation menu. Users can access it via:

**Left Sidebar → Products**

## Testing the Installation

1. Navigate to the Products page in your browser
2. Try creating a new product with the following test data:
   - Name: "Test Product"
   - Description: "This is a test product"
   - Measure Unit: "kg"
3. Verify that the product is saved and appears in the list
4. Test the edit functionality by modifying the product
5. Test the search functionality by filtering by name or measure unit

## Troubleshooting

### Common Issues

1. **Routes not found**: Clear the cache and verify the controller is properly registered
2. **Database errors**: Ensure the migration was executed successfully
3. **Translation issues**: Check that the translation files are in the correct location

### Verification Commands

```bash
# Check if the Product entity is recognized
php bin/console doctrine:schema:validate

# Check if all routes are registered
php bin/console debug:router

# Check if the Product table exists
php bin/console doctrine:query:sql "SHOW TABLES LIKE 'product'"
```

## Support

If you encounter any issues during installation, please check:
1. Symfony logs in `var/log/`
2. Database connection settings
3. File permissions for cache and logs directories 
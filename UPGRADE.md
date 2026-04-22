# Upgrade Guide

## From 1.x to 2.0

### Requirements

- PHP 8.2+
- Sylius 2.2+
- Symfony 7.4+

### Breaking changes

#### Routing path changed

The routing file has been renamed and moved. Update your `config/routes.yaml`:

**Before:**
```yaml
sylius_seo_url_shop:
    prefix: /{_locale}
    resource: "@SyliusSeoUrlPlugin/Resources/config/shop_routing.yml"
```

**After:**
```yaml
sylius_seo_url_shop:
    prefix: /{_locale}
    resource: "@SyliusSeoUrlPlugin/config/shop_routing.php"
```

#### Configuration import removed

The `config.yml` import is no longer needed. Remove it from your configuration:

```yaml
# Remove this line:
- { resource: "@SyliusSeoUrlPlugin/Resources/config/config.yml" }
```

#### Service IDs unchanged

The service IDs remain the same for backward compatibility:
- `stefandoorn.seo_url_plugin.routing.checker.product_slug_condition_checker`
- `stefandoorn.seo_url_plugin.routing.checker.taxon_slug_condition_checker`

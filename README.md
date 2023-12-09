# [TC] Check User Contact Fields for XenForo 2.1.0+

## Description

Checking contact fields when user creating thread.

## Requirements

- XenForo 2.1.0+

## Installation instructions
Copy add-on files, import all and build release.

```bash
git clone https://github.com/TeslaCloud/XF-CheckUserContactFields ./src/addons/TC/CheckUserContactFields
```

```bash
composer install -d ./src/addons/TC/CheckUserContactFields

php cmd.php xf-addon:install -f -n TC/CheckUserContactFields
php cmd.php xf-dev:import -n -a TC/CheckUserContactFields
php cmd.php xf-addon:build-release TC/CheckUserContactFields --skip-hashes
```

### Upgrade from source code (after pull request)
```bash
php cmd.php xf-addon:upgrade TC/CheckUserContactFields
php cmd.php xf-dev:import --addon TC/CheckUserContactFields
```

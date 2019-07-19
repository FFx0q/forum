# phpBoard
phpBoard is a web application where people with questions get the answers they need.

## Requirements
- [php](https://github.com/php)
- [composer](https://getcomposer.org/)

## Installations
### Prerequisites
1. Clone **phpBoard** repository\
`git clone --recursive git@github.com:FFx0q/phpBoard.git`

### Installation
1. Run **Console Prompt**
2. Change dir to your repository dir\
`cd <phpboard_repo_dir>`
3. Install dependencies from composer\
`composer install`
4. Create database and import [schema](https://github.com/FFx0q/phpBoard/blob/master/schema.sql)\
`mysql -u username -p database_name < schema.sql`
5. Create database connection in config/.env
```
DB_HOST=
DB_USERNAME=
DB_PASSWORD=
DB_DATABASE=
```

## License
phpBoard is licensed under the General Public License version 3 - see the [LICENSE](LICENSE) file for details.


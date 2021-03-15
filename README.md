# Currency converter

## Requirements
|  | Version |
| ------ | ------ |
| PHP | 7.4 >*
| Node | Node 14.* > |
| yarn | 1.22 >.* |
| Mysql | 5.7 |

## Environment variables

- Rename the file .env.example to .env
- Set your user, password and database name in .env (DATABASE_URL)
- Set your Free currconv API key (https://www.currencyconverterapi.com/) in the .env (FREE_CURRCONV_API_KEY)

## Installation

Install the dependencies and devDependencies and start the server.

```sh
composer install
yarn install
yarn run dev
symfony server:start
```

## Testing

```sh
php bin/phpunit
```

## Plugins

Is currently extended with the following plugins.

| Plugin |  |
| ------ | ------ |
| Bootstrap vue | https://bootstrap-vue.org/
| Vue.js | https://vuejs.org/
| Vuex | https://vuex.vuejs.org/



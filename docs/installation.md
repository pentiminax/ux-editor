# Installation

Before you start, make sure you have [StimulusBundle configured in your
app](https://symfony.com/bundles/StimulusBundle/current/index.html).

Install the bundle using Composer and Symfony Flex:

``` terminal
composer require pentiminax/ux-exditor
```

If you\'re using WebpackEncore, install your assets and restart Encore
(not needed if you\'re using AssetMapper):

``` terminal
npm install --force
npm run watch

# or use yarn
yarn install --force
yarn watch
```

c require webapp
symfony doctrine:database create
symfony make:migration
symfony doctrine:migrations:create
symfony make:auth
symfony make:registration-form
c require Symfonycasts/verify-email-bundle

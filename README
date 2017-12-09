# api-test

## Preparations
> How to use your solution
- `git clone git@github.com:rdok/api-test.git`
- `echo '192.168.10.10 api.test' | sudo tee --append /etc/hosts`
- `cd api-test; vagrant up;`
- Open URL: http://api.test

## Framework: Lumen
> Your reasons for your choice of web application framework
For Speed. Lumen does not generate sessions or views/html. It is built exactly
for APIs. [See](https://lumen.laravel.com/docs/5.5/releases#5.2.0)

## Catering
> Explain how your solution would cater for different API consumers that
require different recipe data e.g. a mobile app and the front-end of a website.
    - If by different data, we mean transformed data, then the relevant queries
    may specify this, by a query parameter. E.g. ?medium=smartphone. Then the
    API would transform the data accordingly.
    - However, for different data, we may also mean different recipe operations.
     E.g. for smartphones needing to in a single query, call 3 API endpoints.
     Then this API would have to be used by an API Gateway (and the codebase
     distributed to microservices), in order to provide said operations. But, my
     experience with microservices & API gateways is minimal. As such I decided
     to follow this monolothic approach.

## Etc
> Anything else you think is relevant to your solution


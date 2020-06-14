<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

Rest API implementation on Laravel 7.0.

Main features:
* Migrations and Faker Factory (./database/migrations);
* Seeding (./database/seeds)
* Traits (./app/Traits);
* Observers (./app/Observers).

Notifications on important events implemented via Observers.


# Requirements
PHP 7.2.5+

# Installation
    1. cd /path/to/the/laravel-rest/
    2. cp .env.example .env
    3. *edit the .env file*
    4. composer install
    5. php artisan migrate:refresh
    6. php artisan db:seed

# Launch
    php artisan serve

# API

## Endpoints:
    GET    /api/products
    GET    /api/notifications
    GET    /api/users
    GET    /api/users/{user_id}/notifications
    POST   /api/users/{user_id}/notifications/{notification_id}

## Samples    
    
### GET /api/users/notifications

#### Request
    curl http://127.0.0.1:8000/api/notifications

#### Response
    [
      {
        "id": 1,
        "user_id": 43,
        "product_id": 416,
        "type_id": 2,
        "is_viewed": 0,
        "created_at": "2020-06-14 04:57:05",
        "product": {
          "id": 416,
          "status": "active",
          "monthly_inventory": 5
        },
        "type": {
          "id": 2,
          "type": "product status change"
        }
      },
      {
        "id": 2,
        "user_id": 43,
        "product_id": 416,
        "type_id": 3,
        "is_viewed": 0,
        "created_at": "2020-06-14 04:57:05",
        "product": {
          "id": 416,
          "status": "active",
          "monthly_inventory": 5
        },
        "type": {
          "id": 3,
          "type": "product approved"
        }
      },
      
      ...
    ]


### GET /api/products

#### Request
    curl http://127.0.0.1:8000/api/products

#### Response
    [
      {
        "id": 1,
        "status": "active",
        "monthly_inventory": 2,
        "users_products": [
          {
            "user_id": 25,
            "product_id": 1,
            "status": "pending"
          }
        ]
      },
      {
        "id": 2,
        "status": "active",
        "monthly_inventory": 1,
        "users_products": [
          {
            "user_id": 50,
            "product_id": 2,
            "status": "pending"
          }
        ]
      },
      
      ...
    ]


### GET /api/users

#### Request
    curl http://127.0.0.1:8000/api/users

#### Response
    [
      {
        "id": 1,
        "email": "dejuan65@gmail.com"
      },
      {
        "id": 2,
        "email": "kuhn.verna@yahoo.com"
      },
      {
        "id": 3,
        "email": "milo.keeling@gmail.com"
      },
      {
        "id": 4,
        "email": "chase97@hotmail.com"
      },
      
      ...
    ]
    
### GET /api/users/{user_id}/notifications

#### Request
    curl http://127.0.0.1:8000/api/users/1/notifications

#### Response
    [
      {
        "id": 52,
        "user_id": 1,
        "product_id": 476,
        "type_id": 1,
        "is_viewed": 0,
        "created_at": "2020-06-14 04:57:06",
        "type": {
          "id": 1,
          "type": "product inventory depleted"
        }
      },
      {
        "id": 53,
        "user_id": 1,
        "product_id": 476,
        "type_id": 2,
        "is_viewed": 0,
        "created_at": "2020-06-14 04:57:06",
        "type": {
          "id": 2,
          "type": "product status change"
        }
      },
      
      ...
    ]
    
    
    

### POST /api/users/{user_id}/notifications/{notification_id}

#### Request
    curl -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -X POST http://127.0.0.1:8000/api/users/1/notifications/52

## License

[MIT license](https://opensource.org/licenses/MIT).

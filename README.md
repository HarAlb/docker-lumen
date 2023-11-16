# Realisation of 3 layers logic 

> **Note:** In the first install docker see https://docs.docker.com/engine/install/ubuntu/

## How to run project ?

```bash
docker-compose up -d
```
or
```bash
docker-compose up
```

Now the localhost with port 8000 is ready

# App usage logic 

We have 3 layers, in the first it is controller , here you can use only CustomRequest types of laravel

All business logic realizing in Services You need to pas here only data with using DTO

## Services
All services will be extends from class ServiceClass

## Storage service 
This is service where we write queries
# zend-docker-desafio-tecnico

## Requisitos

- Git
- Docker
- Docker-composer

## Instalação

- Realizar o Clone do projeto
  - git clone https://github.com/SistemasWlk/zend-docker-desafio-tecnico.git
- Entra dentro da pasta do projeto
  - cd ~/zend-docker-desafio-tecnico
- Realizar o build na raiz do projeto
  - docker-compose up -d --build    
- Verificar se os conteinês subiram
  - docker ps

```
CONTAINER ID   IMAGE                                                      COMMAND                  CREATED          STATUS          PORTS                                       NAMES
5d0935389d37   phpmyadmin/phpmyadmin:latest                               "/docker-entrypoint.…"   13 minutes ago   Up 13 minutes   0.0.0.0:8099->80/tcp, :::8099->80/tcp       zend-docker-desafio-tecnico_phpmyadmin-app-desafio-tecnico-zend_1
9bb7105e891e   zend-docker-desafio-tecnico_web-app-desafio-tecnico-zend   "sudo /usr/sbin/apac…"   13 minutes ago   Up 13 minutes   0.0.0.0:8098->80/tcp, :::8098->80/tcp       zend-docker-desafio-tecnico_web-app-desafio-tecnico-zend_1
47a03396250d   migs/mysql-5.7:latest                                      "docker-entrypoint.s…"   13 minutes ago   Up 13 minutes   0.0.0.0:3306->3306/tcp, :::3306->3306/tcp   zend-docker-desafio-tecnico_mysql-app-desafio-tecnico-zend_1
```

## Acesso

- projeto: http://localhost:8098/
- phpMyAdmin: http://localhost:8099/

## Acesso ao phpMyAdmin

- Servidor = "mysql-app-desafio-tecnico-zend"
- Usuário = "root"
- Senha = "desafiotecnicozend01"

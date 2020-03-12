#!/usr/bin/env bash

#Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m'

if [[ ! -f ./.env ]]; then
    cp ./.env.example ./.env
fi

function art() {
    docker exec -ti menu-php bash -c "php artisan $@"
}

printf "${RED}\n-> Iniciando Containers\n${NC}"
docker-compose up -d

printf "${RED}\n-> Instalando Dependencias\n${NC}"
docker exec -ti menu-php bash -c "composer install"

printf "${RED}\n-> Migrando Database\n${NC}"
art migrate

printf "${RED}\n-> Populando Database\n${NC}"
art db:seed
printf "${GREEN}Banco de dados disponível em: ${RED}/database/menu.sqlite\n${NC}"
printf "${GREEN}Precisa de mais dados? Execute: ${RED}art db:seed\n${NC}"

printf "${RED}\n-> Start in: http://localhost:8000\n\n${NC}"






# Usa a imagem oficial do PHP com Apache.
# Recomendamos uma versão específica para produção, como php:8.2-apache
FROM php:8.2-apache

# 1. Instala as dependências necessárias (libs) para as extensões do MySQL/MariaDB.
# 2. Instala as extensões mysqli e pdo_mysql usando a ferramenta oficial do Docker.
RUN apt-get update && \
    apt-get install -y libmariadb-dev-compat libmariadb-dev && \
    docker-php-ext-install pdo_mysql mysqli && \
    docker-php-ext-enable pdo_mysql mysqli

# 3. Ativa o módulo de reescrita (mod_rewrite) do Apache.
# Isso é essencial para URLs amigáveis (friendly URLs) e frameworks PHP.
RUN a2enmod rewrite

# 4. Define o diretório de trabalho padrão no contêiner
WORKDIR /var/www/html

# 5. Copia o código da aplicação (a pasta 'app' do host para '/var/www/html' no contêiner)
# Nota: No ambiente de desenvolvimento, usaremos o 'volumes' do compose
# para mapeamento em tempo real, mas é bom ter o COPY para o build final.
COPY . /var/www/html

# A imagem base já define o EXPOSE 80 e o comando de inicialização
# do Apache, então não precisamos de EXPOSE ou CMD aqui.
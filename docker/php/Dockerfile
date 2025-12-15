# Usa a imagem oficial do PHP com Apache.
# Recomendamos uma versão específica para produção, como php:8.2-apache
FROM php:8.2-apache

# 1. Instala as dependências de sistema (libs)
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip xml \
    && rm -rf /var/lib/apt/lists/*

# 2. Ativa o módulo de reescrita (mod_rewrite) do Apache.
RUN a2enmod rewrite

# 3. Define o diretório de trabalho padrão no contêiner
WORKDIR /var/www/html

# 4. COPIA O BINÁRIO DO COMPOSER (Otimização com Multi-stage Build)
# Este é o método preferido: copia o executável 'composer' de uma imagem oficial.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Copia o código da aplicação (incluindo composer.json e composer.lock)
COPY . /var/www/html

# 6. INSTALA AS DEPENDÊNCIAS DO COMPOSER
# Este passo é crucial: ele usa o binário do composer que acabamos de copiar 
# para instalar todos os pacotes definidos no composer.lock/composer.json.
# O --no-dev é recomendado para builds de produção.
RUN composer install --no-interaction --no-progress --no-dev

# A imagem base já define o EXPOSE 80 e o comando de inicialização
# do Apache, então não precisamos de EXPOSE ou CMD aqui.


# Chat em PHP e Ajax
***
## Descrição do projeto
O projeto consiste no desenvolvimento de um sistema de chat em tempo quase real utilizando PHP no backend, Ajax para comunicação assíncrona e MySQL como banco de dados. A aplicação permite que usuários enviem e recebam mensagens sem recarregar a página, graças a requisições Ajax periódicas que consultam novas mensagens no servidor. O PHP é responsável pelo processamento das requisições, armazenamento das mensagens no banco e retorno das informações ao frontend. O sistema inclui recursos como cadastro de usuários, listagem de conversas, envio e exibição dinâmica de mensagens, garantindo uma interface simples, rápida e eficiente.

***

## Baixe o projeto

**1 - Clone o projeto**

```bash
git clone https://github.com/Hudisson/Chat-em-PHP-e-Ajax.git
```

**2 - Rode o Dockerfile e docker-compose.yml**

Abra o terminal do seu SO (Sitema Operacional) na raiz do projeto, onde está localizado os arquivos  docker-compose.yml, 
e execute o comando abaixo.

**Atenção!**  Quando for rodar o projeto, sertifique-se que não há outros containers docker fazendo uso das mesmas portas deste projeto.
Se já ouver algum container fazendo uso das mesmas porta edite as portas deste projeto no arquivo docker-compose.yml.

```bash
docker compose up -d --build
```

**4 - Rode o Composer PHP dentro do Container**

Acesse o terminal do seu SO e execulte:

```bash
docker exec -it chatapp bash
```

Agora dentro do conatiner, execulte:

```bash
composer install
```

**4 - Abra o seu navegador e visualize o projeto**

Abra o seu navegador de internet e acesse: http://localhost:5000.

Voçê verá a seguinte tela de login

<img src="https://github.com/Hudisson/Chat-em-PHP-e-Ajax/blob/main/imagens/login.png" width="1200px" />

***

***Atenção:*** Se voçê fez alterção na porta exposta deste projeto, troque a porta 5000 pela número da porta que você escolheu.
***

**5 - Crie o banco de dados e suas tabelas**

Acesse seu cliente MySQL (exemplo: MySQL Workbench, Phpmyadmin) e execulte o script (chat-php-ajax.sql) que está na 
pasta SQL deste projeto.

**6 - Crie uma conta**

Após configurado o banco de dados voçê já pode criar contas e testar o projeto
Abra o seu navegador de internet e acesse: http://localhost:5000 e clique em criar uma conta. 
Ou, se preferir, acesse: http://localhost:5000/cadastro.

Você verá a seguinte tela de cadastro

<img src="https://github.com/Hudisson/Chat-em-PHP-e-Ajax/blob/main/imagens/cadastro.png" width="1200px" />

**7 - Fazendo login**

Após já ter criado as contas acesse a página de login e faça o login em alguma delas

Feito o login, você verá a seguinte tela

<img src="https://github.com/Hudisson/Chat-em-PHP-e-Ajax/blob/main/imagens/chathome.png" width="1200px" />

Agora selecione um usuário listado e comoçe a conversar

<img src="https://github.com/Hudisson/Chat-em-PHP-e-Ajax/blob/main/imagens/conversa.png" width="1200px" />


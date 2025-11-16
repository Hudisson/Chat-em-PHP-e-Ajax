<?php
include_once "includes/header.php";
?>


<div class="container wrapper">
    <section class="users">
        <header>

            <div class="content">

                <div class="logo-chat">
                    <h1>Home Chat</h1>
                </div>

                <div class="img-foto">
                    <img src="../../../chat/resources/assets/img/h.jpeg" alt="">
                </div>


                <div class="details">
                    <span>João</span>
                    <p>Oline</p>
                    <a href="" class="logout">Sair</a>
                </div>

            </div>

        </header>
    </section>

    <main>
        <div class="container main">

            <div class="chat-view">
                <div class="contact-msg">
                    <span class="contact-name">Fulano da Silva</span> <span class="status">Oline</span>
                </div>

                <hr>

                <div class="conversation">

                    <div class="msg-received">
                        Olá!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Perferendis nihil ullam 
                    </div>

                    <div class="msg-sent">
                        Oi!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Perferendis nihil ullam
                    </div>
                </div>

            </div>

            <div class="contact-list">

                <div class="search">
                    <label>Pesquisar contato</label>
                    <input type="text" class="form-control pesquisar" id="search" placeholder="Pesquisar">
                </div>

                <hr>

                <div class="friends">
                    <img src="../../../chat/resources/assets/img/h.jpeg" alt="">
                    <span class="friend-name">Fulano da Silva</span>
                    <span class="status">Oline</span>
                </div>

                <div class="friends">
                    <img src="../../../chat/resources/assets/img/m.jpeg" alt="">
                    <span class="friend-name">Beltrano dos Santos</span>
                    <span class="status">Oline</span>
                </div>

                <div class="friends">
                    <img src="../../../chat/resources/assets/img/m.jpeg" alt="">
                    <span class="friend-name">Ciclano de Tal</span>
                    <span class="status">Oline</span>
                </div>

            </div>
        </div>

    </main>


    <?php
    include_once "includes/footer.php";
    ?>
<?php
  include ("./connection/connection.php");
  include ("./sessoes/sessao.php");
  $search = false;

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tela Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- navbar -->
  <?php
    exibirNavbar(false);
  ?>


</head>

<body>
  <!-- carousel das imagens -->
  <?php
    exibirCarousel();
  ?>

  <!-- insignias -->
  <h1 class="text-center m-5">VEJA as nossas parcerias:</h1>

  <div class="row flex-grow-0 mb-3 d-flex justify-content-center gap-5">
    <div class="card" style="width: 18rem; height:23rem;">
      <div class="imgBox mt-4">
        <img src="./img/logoIBM.png" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">IBM</h5>
        <p class="card-text text-center">Há 5 anos que temos uma parceria com a IBM, sendo nós um dos Principais
          fornecedores de aluno para fazerem estágio na IBM, tendo fornecido 10000 vagas em 2024</p>
      </div>
    </div>

    <div class="card" style="width: 18rem; height:23rem;">
      <div class="imgBox mt-5">
        <img src="./img/logoSENAI.png" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">SENAI</h5>
        <p class="card-text text-center">Sendo nossa empresa fundadora, temos uma parceria de cursos com o SENAI, VEJA
          não possui cursos presencias, porém com a parceria com o SENAI estamos planejando fazer mais de 5 novos cursos
        </p>
      </div>
    </div>

    <div class="card" style="width: 18rem; height:23rem;">
      <div class="imgBox mt-2">
        <img src="./img/logoMicrosoft.png" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Microsoft</h5>
        <p class="card-text text-center">Microsoft é a nossa principal provedora de finanças, sendo responsável por 20%
          das ações de nossa empresa, foi fundamental para nossa volta á internet em 2015</p>
      </div>
    </div>

    <div class="card" style="width: 18rem; height:23rem;">
      <div class="imgBox mt-2">
        <img src="./img/logoNvidia.png" class="card-img-top" alt="...">
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Nvidia</h5>
        <p class="card-text text-center">Nvidia é a empresa o qual mais referência seus funcionarios para nossos cursos,
          temos o orgulho de termos ensinado cerca de 5% de seus funcionários</p>
      </div>
    </div>
  </div>


  <!-- titulo -->
  <h1 class="text-center m-5">VEJA tambem alguns de nossos cursos</h1>


  <!-- cyberseguranca -->
  <main>
    <article aria-label="seção sobre mim" class="sobre" id="about">
      <div class="sobre_titulo">
        <h1>Cyber Segurança</h1> <!--About me-->
        <p>Um pouco sobre nosso curso de Cyber Segurança</p><!--Professional Profile - There is All About me-->
        <div aria-label="Seção apenas de ilustrações de botões">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <img src="img/anonymus.png" alt="imagem de uma pessoa ilustrativa">
      <div class="sobre_conteudo">
        <div class="sobre_texto">
          <h1> Curso de Cyber Segurança</h1>
          <p>Nosso curso de Cibersegurança é uma imersão completa no mundo da proteção digital. Em um cenário cada vez
            mais interconectado, onde dados sensíveis e informações pessoais são armazenados e compartilhados em larga
            escala, a segurança cibernética se tornou uma prioridade essencial para empresas e organizações de todos os
            tamanhos.

            Este curso abrange desde os fundamentos da segurança da informação até as técnicas avançadas de proteção
            contra ameaças cibernéticas. Com uma abordagem prática e orientada para resultados, os participantes
            aprenderão a identificar vulnerabilidades, implementar medidas de segurança robustas e responder eficazmente
            a incidentes de segurança.

            Principais Tópicos:

            Fundamentos da cibersegurança: conceitos básicos, ameaças comuns e princípios de segurança da informação.
            Gerenciamento de riscos: avaliação de vulnerabilidades, análise de riscos e estratégias de mitigação.
            Proteção de redes e sistemas: configuração de firewalls, detecção de intrusões e práticas recomendadas para
            manter a integridade dos sistemas.
            Criptografia e segurança de dados: princípios de criptografia, proteção de dados em repouso e em trânsito, e
            estratégias de gerenciamento de chaves.
            Resposta a incidentes: planejamento de resposta a incidentes, investigação forense digital e gestão de
            crises de segurança.
            Ao concluir este curso, os participantes estarão preparados para enfrentar os desafios complexos da
            cibersegurança em um mundo digital em constante evolução, fortalecendo a segurança de suas organizações e
            protegendo os ativos digitais de ataques maliciosos.
          </p>
        </div>
        <div class="sobre_info">
          <p><i class="fa-solid fa-calendar-days"></i>Criado em 28/04/2024</p>
          <p><i class="fa-solid fa-location-dot"></i>Endereço: SENAI alvares romi - SBO</p>
          <p><i class="fa-solid fa-flag"></i>Nacionalidade: Brasil</p>
          <p><i class="fa-solid fa-envelope"></i>Email: VEJACompany@gmail.com</p>
        </div>
      </div>
    </article>
  </main>
  <section class="services" id="services">
    <div class="sobre_titulo">
      <h1>O que iremos aprender:</h1>
      <p>Parte do que iremos aprender</p>
      <div aria-label="Seção apenas de ilustrações de botões">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="my_services">
  <ul class="list-unstyled row" aria-label="Navegação secundaria">
    <li class="col-md-4">
      <i class="fa-solid fa-globe fa-3x"></i>
      <h3>Consultoria Estratégica</h3>
      <p>A consultoria inclui a identificação de ameaças e vulnerabilidades, o desenvolvimento de controles de segurança e a melhoria de uma cultura de cibersegurança dentro da organização.</p>
    </li>
    <li class="col-md-4 col-lg-6">
      <i class="fa-solid fa-bug fa-3x"></i>
      <h3>Falhas no Sistema</h3>
      <p>Identificar falhas sistêmicas é um componente essencial da abordagem proativa de nossa empresa. Utilizando metodologias avançadas de avaliação de riscos e análise de vulnerabilidades, examinamos minuciosamente a infraestrutura digital de uma empresa.</p>
    </li>
    <li class="col-md-4">
      <i class="fa-solid fa-laptop-code fa-3x"></i>
      <h3>Personalização</h3>
      <p>O que diferencia a Cyber Company Solution é a personalização de suas soluções. Nossa empresa reconhece que cada empresa é única em sua estrutura, operações e desafios. Portanto, os serviços são adaptados de acordo com as necessidades específicas de cada cliente.</p>
    </li>
  </ul>
</div>

<div class="my_services" style="margin-top:30px;">
  <ul class="list-unstyled row" aria-label="navegação secundaria">
    <li class="col-md-4">
      <i class="fa-solid fa-layer-group fa-3x"></i>
      <h3>Capacitação</h3>
      <p>Reconhecendo que a cibersegurança é uma responsabilidade coletiva, a Cyber Company Solution tem como objetivo fornecer treinamento abrangente para todos os funcionários, independentemente do departamento.</p>
    </li>
    <li class="col-md-4">
      <i class="fa-solid fa-medal fa-3x"></i>
      <h3>CTF's</h3>
      <p>CTF é uma estratégia que vai além das abordagens de treinamento tradicionais e simula ambientes e sistemas reais, desafiando os participantes a identificar e explorar vulnerabilidades em sistemas simulados.</p>
    </li>
    <li class="col-md-4 col-lg-5">
      <i class="fa-solid fa-users fa-3x"></i>
      <h3>Comunidade</h3>
      <p>A cibersegurança é uma parte integrante da cultura organizacional e, ao tornar o treinamento e as competições de CTF parte do dia a dia, a conscientização e a responsabilidade de todos os funcionários na proteção dos ativos digitais da empresa são fortalecidas.</p>
    </li>
  </ul>
</div>
  </section>



  <?php
    exibirFooter();
  ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
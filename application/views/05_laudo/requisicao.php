<html lang="pt-BR">

<head>
    <meta charset="utf-8"/>
    <title>Requisição | SGEquinos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets/imagens/logo/favicon.png') ?>">
    <meta content="" name="description"/>
    <meta content="PixcredThemes" name="L8 Digital"/>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,500,700,800&display=swap" rel="stylesheet">
    <style>
        html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        body {
            line-height: 1;
        }

        html {
            box-sizing: border-box;
        }
        .body-wrap {
            width: 800px;
            display: block;
            margin: 0 auto;
            box-sizing: border-box;
        }

        tr, td{
          border-color: black;
          border-width: 2px;
          border-style: solid;
          padding-left: 5px;
          padding-right: 5px;
        }

        .btn-primary {
            width: 175px;
            padding: 12px 0;
            /*margin: 0 3px;*/
            text-decoration: none;
            font-size: .75rem;
            color: #FFF;
            background-color: #000 !important;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 5px;
            border: none;
            transition: .3s ease-in-out;
            /*box-shadow: 0 0 8px rgba(0,0,0,.2);*/
        }

        @media print {
            .botoes-opcao{
                display: none;
            }

            @page {
                margin-top: 0;
                margin-bottom: 0;
            }
            body {
                padding-top: 40px;
                padding-bottom: 0px ;
            }
        }
    </style>
</head>

<body>
  <div class="body-wrap">
    <table style="width: 800px;">
      <thead>
        <tr>
          <td width="100%" colspan="3" style="text-align: center; font-weight: bold; height:30px; vertical-align: middle;">
            REQUISIÇÃO DE DIAGNÓSTICO DE <?= $tipo_requisicao ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <!-- DADOS DO LABORATÓRIO -->
        <tr>
          <td width="30%">Laboratório: <br> <?=$nome_laboratorio?></td>
          <td width="30%">Portaria de Credenciamento: <br> <?=$portaria_credenciamento?></td>
          <td width="30%" rowspan="3">Número do Exame: <br> <?=$numero_exame?></td>
        </tr>
        <tr>
          <td width="30%" nowrap>Endereço: <br> <?=$endereco_laboratorio?></td>
          <td width="30%">Telefone: <br> <?=$nome_laboratorio?></td>
        </tr>
        <tr>
          <td width="30%">Cidade / UF: <br> <?=$cidadeuf_laboratorio?></td>
          <td width="30%">E-Mail: <br> <?=$email_laboratorio?></td>
        </tr>
        <!-- DADOS DO PROPRIETÁRIO -->
        <tr>
          <td width="30%">Nome do Proprietário: <br> <?=$nome_proprietario?></td>
          <td width="30%">Endereço: <br> <?=$endereco_proprietario?></td>
          <td width="30%">Telefone: <br> <?=$telefone_proprietario?></td>
        </tr>
        <!-- DADOS DO VETERINÁRIO -->
        <tr>
          <td width="30%">Nome do Veterinário: <br> <?=$nome_veterinario?></td>
          <td width="30%">Endereço: <br> <?=$endereco_veterinario?></td>
          <td width="30%">Telefone: <br> <?=$telefone_veterinario?></td>
        </tr>
      </tbody>
    </table>


    <table style="margin-top: 10px; width: 800px;">
      <tbody>
        <!-- DADOS DO ANIMAL -->
        <tr>
          <td width="25%">Nome do Animal: <br> <?=$nome_animal?></td>
          <td width="25%">Registro / Nº / Marca: <br> <?=$registro_animal?></td>
          <td width="50%" colspan="6">Classificação:</td>
        </tr>
        <tr>
          <td width="25%">Espécie: <br> <?= $especie_animal ?></td>
          <td width="25%">Raça: <br> <?= $raca_animal ?></td>
          <td width="5%" style="text-align: center;">JC:</td>
          <td width="5%" style="text-align: center;">SH:</td>
          <td width="5%" style="text-align: center;">H:</td>
          <td width="5%" style="text-align: center;">FC:</td>
          <td width="5%" style="text-align: center;">UM:</td>
          <td width="25%" style="text-align: center;">OUTRA:</td>
        </tr>
        <tr>
          <td width="25%">Sexo: <br> <?=$sexo_animal?></td>
          <td width="25%">Idade: <br> <?=$idade_animal?></td>
          <td width="5%" style="text-align: center; font-size:16px; font-weight: bold;"> <?= ($classificacao_animal == 1) ? 'X' : '' ?></td>
          <td width="5%" style="text-align: center; font-size:16px; font-weight: bold;"> <?= ($classificacao_animal == 2) ? 'X' : '' ?></td>
          <td width="5%" style="text-align: center; font-size:16px; font-weight: bold;"> <?= ($classificacao_animal == 3) ? 'X' : '' ?></td>
          <td width="5%" style="text-align: center; font-size:16px; font-weight: bold;"> <?= ($classificacao_animal == 4) ? 'X' : '' ?></td>
          <td width="5%" style="text-align: center; font-size:16px; font-weight: bold;"> <?= ($classificacao_animal == 5) ? 'X' : '' ?></td>
          <td width="25%" style="text-align: center; font-size:16px; font-weight: bold;"> <?= ($classificacao_animal == 6) ? $outraclassificacao_animal : '' ?></td>
        </tr>
        <tr>
          <td width="50%">Propriedade onde Se Encontra: <br> <?=$nome_propriedade?></td>
          <td width="50%" colspan="7" rowspan="2">Número de Equídeos na Propriedade: <br><br><br><?=$qtdequinos_propriedade?></td>
        </tr>
        <tr>
          <td width="50%">Município: <br> <?=$cidadeuf_propriedade?></td>
        </tr>
      </tbody>
    </table>

    <table style="margin-top: 10px; width: 800px;">
      <tbody>
        <tr>
          <td style="text-align:center;"><img src="<?=base_url($imagem_animal)?>" alt="" width="80%"></td>
        </tr>
        <tr>
          <td style="height: 100px">Descrição do animal<br><br><br><?=$descricao_animal?></td>
        </tr>
      </tbody>
    </table>

    <table style="margin-top: 10px; width: 380px; position: absolute;">
      <tbody>
        <tr>
          <td style="text-align: center;">REQUISITANTE</td>
        </tr>
        <tr>
          <td style="height: 200px; text-align: center; vertical-align: middle;">A colheita da amostra e resenha deste animal são de minha responsabilidade
            <br>
            _______________, _______ de ________________ de ___________<br>
            <span style="font-size: 12px">Município e data da colheita</span><br>
            <br>
            <br>
            _____________________________________<br>
            <span style="font-size: 12px">Assinatura e Carimbo do Médico Veterinário Requisitante</span>
          </td>
        </tr>
      </tbody>
    </table>

    <table style="margin-top: 10px; margin-left: 420px; width: 380px; position: relative;">
      <tbody>
        <tr>
          <td style="text-align: center;">LABORATÓRIO</td>
        </tr>
        <tr>
          <td style="height: 38px;">Antígeno - Marca ou Nome<br></td>
        </tr><tr>
          <td style="height: 38px;">Nº da Partida<br></td>
        </tr><tr>
          <td style="height: 38px;">Data do Resultado do Exame<br></td>
        </tr><tr>
          <td style="height: 38px;">Resultado</td>
        </tr><tr>
          <td style="height: 40px;">Assinatura ou Carimbo do Responsável Técnico</td>
        </tr>
      </tbody>
    </table>
    <div class="botoes-opcao" style="margin-top: 25px;">
        <button type="button" class="btn-primary" onclick=" window.print();">Imprimir</button>
        <!-- <button type="button" class="btn-primary" onclick="window.open(window.location.href+'/pdf');" style="margin-left: 445px">PDF</button> -->
    </div>
  </div>
</body>
</html>
<?php

    //objetivo: receber 4 parametros e calcular a media

    /* cenarios de tratamentos
    1. a nota tem que estar entre 0 e 10
    2. não pode ter notas negativas
    3. todas as notas são obrigatórias
    4. não pode ter letra
    */

    /* resultado esperado
    . a média
    . status
        0 <= nota < 2: muito ruim
        2 - 5: ruim
        5 - 7: regular
        7 - 9: bom
        9 - 10: muito bom'
    */
    
    /* validacao se veio o parametro*/
    if( 
        !isset( $_REQUEST["nota1"] ) ||
        !isset( $_REQUEST["nota2"] ) ||
        !isset( $_REQUEST["nota3"] ) ||
        !isset( $_REQUEST["nota4"] )
    ){

        echo "parametros invalidos" ;
        exit ;

    }else{

        $nota1 = $_REQUEST["nota1"] ;
        $nota2 = $_REQUEST["nota2"] ;
        $nota3 = $_REQUEST["nota3"] ;
        $nota4 = $_REQUEST["nota4"] ;

    }
    
    /* verificar se é numérica */
    if(
        !is_numeric(  $nota1 ) ||
        !is_numeric(  $nota2 ) ||
        !is_numeric(  $nota3 ) ||
        !is_numeric(  $nota4 ) 
    ){
        echo "voce informou um numero nao numerico." ;
        exit ;
    }

    /* se é numero e está entre 0 e 10 - valida 2 e 3 */
    if(
        $nota1 < 0 || $nota1 > 10 ||
        $nota2 < 0 || $nota2 > 10 ||
        $nota3 < 0 || $nota3 > 10 ||
        $nota4 < 0 || $nota4 > 10
        ){
        echo "Foi informada fora do valor permitido" ;
        exit ;
    }

    // calcular a media
    $media = ( $nota1 + $nota2 + $nota3 + $nota4 ) / 4 ;

    // inicializa o array de retorno
    $retornoJson = array( ) ;

    $retornoJson["media"] = $media ;

    if( $media >= 0 && $media < 2 ){
        $status = "muito ruim" ;
    }else if( $media >= 2 && $media < 5 ){
        $status = "ruim" ;
    }else if( $media >= 5 && $media < 7 ){
        $status = "regular" ;
    }else if( $media >= 7 && $media < 9 ){
        $status = "bom" ;
    }else if( $media >= 9 && $media < 10 ){
        $status = "muito bom" ;
    }

    $retornoJson["status"] = $status ;

    echo json_encode( $retornoJson ) ;
    exit ;
?>
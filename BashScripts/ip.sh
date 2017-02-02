#!/bin/bash
###############################################
#                                             #
#   Descubra seu IP Externo (GNU GPL v.2)     #
#   Autor: Marcello d'Aguiar Dantas           #
#   E-mail: mdantas76@gmail.com               #
#                                             #
#   Necessita do browser Links 2 instalado.   #
#   Download=> http://links.twibright.com/    #
#   Disponivel tambem em pacotes RPM e DEB.   #
#                                             #
###############################################
clear
links2 -dump www.meuip.com.br | grep "Meu ip" | awk '{print "Seu IP externo: " $4}'

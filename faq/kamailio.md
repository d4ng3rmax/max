##Script Para Instalação Do Kamailio


Este script inicia uma máquina virtual com sistema operacional ubuntu/trusty6
e instala o Kamailio e as ferramentas do RackUP. Adicionalmente, todas as 
configurações para suporte a WebSockets são realizadas no ambiente.


**1. ANTES DE EXECUTAR**

Antes de executar este script, é necessário que seja realizado o download
da imagem do sistema operacional. Para tanto, instale o vagrant 
(www.vagrantup.com) e o VirtualBox (www.virtualbox.com) em seu computador.

Feito isto, execute o comando abaixo para efetuar o download da imagem:

```boo
$sudo vagrant box add ubuntu/trusty64
```


**2. EXECUCAO DO SCRIPT**

No diretório em que os pacote foi extraído (mesmo diretório em que este
arquivo README se encontra) execute o comando:

```boo
$sudo vagrant up
```

*O sistema irá gerar uma máquina virtual no VirtualBox e realizar download
de todos os pacotes e suas configurações.*


**3. APOS A EXECUCAO DO SCRIPT**

Quando concluida a execução do script, acesse o servidor recém instalado
através do comando:

```boo
$sudo vagrant ssh
```

Este comando também deve ser executado no mesmo diretório.

O próximo passo é realizar a configuração da base de dados para o Kamailio.
Para isto, execute o comando:

```boo
$sudo /usr/local/sbin/kamdbctl create
```

*Responda todas as opções como* **Y**.

*Inicie o serviço do kamailio:*

```boo
$sudo service kamailio start
```

Crie um domínio para ser utilizado no kamailio:

```boo
$kamctl domain add <nome do dominio>
```

Crie usuários no kamailio:

```boo
$kamctl add <user>@<dominio> <senha>
```

Execute o reload na lista de dominios do kamailio:

```boo
$kamctl domain reload
```

**4. RACKUP**

O script e instalação já inicia o rackup e publica a página de testes que
temos disponível. Para acessar esta interface, acessa através de seu browser
o endereço IP do servidor (eth1) na porta 9292.

Ao reiniciar o servidor o rackup não estará em execução. Para iniciar este 
serviço acesse o diretório **/op/rackup**:

```boo
$cd /opt/rackup
```

E execute o comando:

```boo
$rackup config.ru &
```

@Bruno Emer
brunoemer@gmail.com

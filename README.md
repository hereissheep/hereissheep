## Instalação

Para rodar o projeto precisamos dos seguintes requisitos:

* php >=5.4
* redis
* mysql ou postgres

*Instalando com o vagrant*

Nós disponibilizamos uma box com o necessário para rodar o projeto. Se você não conhece o 
vagrant [visite o site](https://www.vagrantup.com/).

Na pasta do projeto rode:

```bash
vagrant up
```

*Composer*

Ainda na pasta do projeto execute o composer para baixar as dependências.

```bash
composer install
```

## Uso

Se você utilizou a maquina do vagrant coloque em seu arquivo **/etc/hosts**

```text
192.168.56.103  dev.symfony-todo.com.br
```

Agora basta acessar a url: http://dev.symfony-todo.com.br/app_dev.php

## Testando

``` bash
$ phpunit
```

## Contribuindo

Por favor leia [CONTRIBUTING](http://git.voxtecnologia.com.br:88/vox/sigfacil/blob/master/CONTRIBUTING.md) para 
maiores detalhes.

## License

The MIT License (MIT). Please see [License File](http://git.voxtecnologia.com.br:88/vox/sigfacil/blob/master/LICENSE) 
for more information.

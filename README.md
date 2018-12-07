# Projeto Facilita

Breve descrição sobre o projeto

## Getting Started

Para começar o desenvolvimento deste projeto sera necessário a instalação de algumsa ferramentas listadas abaixo:



Instalação de um servidor com Apache e PHP 
Apache 2.4 <br>
PHP 5.6 <br>
Laravel Framework 5.6 <br>
Bootstrap 4.1 <br>
NPM 6.4.1 <br>



### Pré Requisitos
Apache 2.4 <br>
PHP 5.6 <br>
Laravel Framework 5.6 <br>
Bootstrap 4.1 <br>
NPM 6.4.1 <br>


### Instalando

Passo a passo de instalação do projeto na sua máquina local

** Lembrando que este é o ambiente de desenvolvimento

```
git clone git@github.com:prjfacilita/prj_facilita.git
```

Após clonar o projeto entre dentro da pasta através do terminal

```
cd prj_facilita
```

Agora que você esta na raiz do projeto execute os seguintes comandos para configurar o ambiente de desenvolvimento

** Este comando irá instalar as bibliotecas do front-end
```
npm install
```

Após instalar as bibliotecas necessárias, você pode rodar o projeto através do comando 

```
php artisan serve
```
Que irá iniciar o artesão do laravel para que você possa visualizar o seu projeto no navegador



## Publicando alterações
Para você que esta iniciando agora com github segue um passo a passo de como publicar suas alterações sem complicações
### Após fazer uma edição em algum arquivo ou função


```
git add <nome do arquivo> ou git add . para adicionar todos os arquivos modificados
```
Agora que você já adicionou os arquivos necessários na memória, você precisa fazer um comentário para essas alterações, isso vai te ajudar com o histórico de bugs ou de releases

```
git commit -m "[BUG] Correção de bug de login"
```

### Após fazer um comentário, você precisa enviar todas essas alterações para o repositório do github

Agora é só enviar

```
git push origin master
```

## IMPORTANTE, lembrando que antes de fazer alterações, você precisa atualizar o seu projeto
Basta rodar o seguinte comando

```
git pull origin master
```


## Banco de dados
* [Banco de dados PDF 0.1](https://github.com/prjfacilita/prj_facilita/blob/master/database/Facilita_MD.pdf) - Diagrama do banco de dados

## Ferramentas
* [Laravel Framework](http://www.dropwizard.io/1.0.2/docs/) - Framework Laravel construido em PHP
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds


## Autor

* **Rodrigo Teles** -

See also the list of [contributors] ( https://github.com/prjfacilita/prj_facilita/graphs/contributors ) who participated in this project.


## Produção

Ao publicar o sistema, colocar o "Supervisor" para rodar os jobs automaticos ->
https://blog.especializati.com.br/queues-no-laravel-filas/

## Recomendações

* Prepare um café
* Coloque uma música
* go to code  <3




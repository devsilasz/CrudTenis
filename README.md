# O QUE É CRUD?

 CRUD é um acrônimo para Create (criar), Read (ler), Update (atualizar) e Delete (excluir), que representa as principais operações realizadas em um sistema de gerenciamento de banco de dados. É uma forma de descrever as ações básicas que podem ser executadas sobre os dados em um banco de dados.

 ## POO (Programação orientada a objetos)
 A Programação Orientada a Objetos é um paradigma de programação que organiza o código em objetos, que são instâncias de classes. As classes definem as propriedades (atributos) e comportamentos (métodos) dos objetos. A POO permite encapsular o código, tornando-o mais modular, reutilizável e facilitando a manutenção.

## MVC (Model-View-Controller):
MVC é um padrão de arquitetura de software amplamente utilizado para separar as responsabilidades em um aplicativo web. Consiste em três componentes principais:

- Model (Modelo): Representa a camada de dados do aplicativo. O modelo lida com a manipulação e persistência dos dados, normalmente interagindo com um banco de dados. No caso do PHP e MySQL, o modelo seria responsável por executar as consultas SQL para criar, ler, atualizar e excluir os registros no banco de dados.

- View (Visão): É a camada de apresentação do aplicativo, responsável pela exibição dos dados ao usuário. A visão é responsável por fornecer a interface do usuário, como formulários, tabelas, páginas HTML, etc.

- Controller (Controlador): É a camada que lida com a lógica de negócio e coordena a interação entre o modelo e a visão. O controlador recebe as solicitações do usuário, processa os dados recebidos, interage com o modelo para realizar operações de CRUD e decide qual visão deve ser apresentada ao usuário.

Em um aplicativo web PHP e MySQL que segue o padrão MVC, o CRUD seria implementado da seguinte forma:

- Create (criar): O controlador recebe os dados enviados pelo usuário, cria um novo objeto do modelo e chama um método do modelo para persistir os dados no banco de dados.

- Read (ler): O controlador recebe uma solicitação do usuário para visualizar os dados, consulta o modelo para obter os dados necessários do banco de dados e passa esses dados para a visão. A visão é então responsável por exibir esses dados.

- Update (atualizar): O controlador recebe os dados atualizados do usuário, chama um método do modelo para atualizar os dados correspondentes no banco de dados.

- Delete (excluir): O controlador recebe uma solicitação para excluir um registro específico, chama um método do modelo para remover o registro correspondente do banco de dados.

Em resumo, o CRUD POO MVC em PHP e MySQL combina a estrutura de programação orientada a objetos com o padrão de arquitetura MVC para fornecer uma abordagem organizada e modular para a criação, leitura, atualização e exclusão de dados em um banco de dados usando a linguagem PHP e o banco de dados MySQL.

Siga o passo a passo no LEIA.txt ao baixar, para saber como utiliza-lo.

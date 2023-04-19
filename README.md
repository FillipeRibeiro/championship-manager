# Desafio Back-End - Campeonato de Futebol

Organizando um campeonato de futebol de salão no final do ano entre os seus funcionários. Como serão vários times e em dias diferentes a diretoria solicitou o desenvolvimento de um sistema para controlar o campeonato.

> Esta aplicação deverá representar um campeonato de futebol de salão. Cada time poderá conter no máximo 5 jogadores em campo incluindo o goleiro. Não haverá reservas, juiz ou bandeirinha.
>
> O usuário poderá cadastrar os jogadores como também distribuir os jogadores nos seus respectivos times. Uma vez escalado o jogador não poderá mudar de time, mas o usuário poderá ajustar: o nome do jogador, número da sua camiseta e o nome do time se necessário. Não será possível cadastrar um jogador com CPF duplicado.
>
> Os jogos serão registrados após a realização dos mesmos, desta forma será necessário preencher os seguintes dados: Data da partida, Hora de início da partida, Hora de término da partida, times, cartões e o placar para a classificação final. Um detalhe importante é que poderá ser editado a partida caso tenha alguma informação incorreta.
>
> Caso algum jogador cometa faltas e/ou tenha recebido cartão vermelho, estes valores serão considerados como fator de desempate no final do campeonato. O critério de desempate será o seguinte: cada cartão vermelho corresponderá a 2 pontos e cada cartão amarelo corresponderá a 1 ponto, quem tiver menos pontos ganha.
>
> Exibir de forma automática o ranking dos times com melhor placar e também um ranking dos jogadores para premiação na festa.

## A API deverá ser capaz de:

1. Cadastrar, editar e listar os jogadores

- Nome\*
- CPF\*
- Número da camiseta\*

2. Cadastrar, editar e listar os times

- Nome do time
- Jogadores

3. Cadastrar e editar as partidas

- Data\*
- Horário início\*
- Horário término\*
- Times\*
- Placar\*
- Cartões

4. Listar a classificação dos times no campeonato

- Time
- Quantidade de gols

### Itens que podem ser implementados e acrescentam pontos:

- Cadastro de cartões por partida;
- Listar a classificação dos jogadores no campeonato;
- Ordenação das listagens;
- Filtros das listagens;
- Utilização de containers Docker;
- Implementação de Testes Unitários;
- Implementação de Testes de Integração;
- Autenticação na API;

<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SEED DRAGON BALL
        $conf = [
            'autor' => 'Akira Toriyama',
            'preco' => 24.99,
            'paginas' => 192,
            'editora_id' => 2,
            'colecao_id' => 1,
        ];
        $livros = [
            [
                'titulo' => 'Dragon Ball Vol. 1',
                'resumo' => "Son Goku é um pequeno órfão de coração puro, mas com uma tremenda força. Depois de viver tanto tempo isolado da civilização, ele recebe a inesperada visita de uma garota! Bulma lhe propõe uma parceria para buscar as sete Esferas do Dragão, que, quando reunidas, são capazes de realizar qualquer desejo! Perigos e adversários não faltarão no caminho dessa dupla inusitada, e os mais variados personagens marcarão presença nesta aventura cheia de humor!",
                'isbn' => '978-6555124644',
                'imagem' => "dragon_ball_01.webp",
                'data_lancamento' => "2020-10-01",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Dragon Ball Vol. 2',
                'resumo' => "Depois de passar tantos apuros, Goku, Bulma e seus companheiros seguem sua jornada e já conseguiram cinco das sete Esferas do Dragão! A sexta esfera já foi localizada, mas precisarão novamente da ajuda do Mestre Kame! E logo eles descobrirão também que há outros interessados na dádiva do Rei Dragão Sheng Long…",
                'isbn' => '978-6555124651',
                'imagem' => "dragon_ball_02.webp",
                'data_lancamento' => "2020-11-01",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Dragon Ball Vol. 3',
                'resumo' => "Goku continua sua busca por uma garota bonita, que é pedido do Mestre Kame em troca do treinamento. Por sorte, ele recebe a ajuda de outro aspirante a discípulo de Muntenroshi, quase tão safado quanto o mestre! Só que o tão esperado treinamento não é exatamente como eles imaginavam!",
                'isbn' => '978-6555124668',
                'imagem' => "dragon_ball_03.webp",
                'data_lancamento' => "2020-11-07",
                'qtd_estoque' => 12,
            ],
            [
                'titulo' => 'Dragon Ball Vol. 4',
                'resumo' => "Goku e Kulilin se inscrevem no Torneio de Artes Marciais e chegam mais longe do que esperavam! Mas, nas finais, os adversários não darão moleza! E as mais divertidas batalhas de força e esperteza continuam!",
                'isbn' => '978-6555124675',
                'imagem' => "dragon_ball_04.webp",
                'data_lancamento' => "2020-11-07",
                'qtd_estoque' => 0,
            ],
            [
                'titulo' => 'Dragon Ball Vol. 5',
                'resumo' => "A luta de Goku com Jackie Chun termina com um chute, e Jackie é o vencedor. Goku sai para encontrar a Esfera de Quatro Estrelas de seu avô, mas logo se encontra com a Força Red Ribbon, uma força militar que também procura as Esferas do Dragão para si. Após derrotar Coronel Silver, Goku se encontra ao norte na Vila Jingle, onde ele luta com General White em sua fortaleza, Muscle Tower. Com o fim da luta entre Goku e Jackie Chun, o garoto sai em busca da esfera de seu avô, mas descobre que uma força militar chamada Red Ribbon também está procurando as esferas.",
                'isbn' => '978-6555124682',
                'imagem' => "dragon_ball_05.webp",
                'data_lancamento' => "2020-11-07",
                'qtd_estoque' => 0,
            ],
            [
                'titulo' => 'Dragon Ball Vol. 6',
                'resumo' => "Goku continua sua invasão à Muscle Tower para libertar o prefeito da pequena vila, mas muitas surpresas ainda o aguardam! Além disso, Goku vai à cidade grande reencontrar Bulma!! Só que o terrível exército Red Ribbon nunca esquece um inimigo e agora está muito interessado em Goku!!",
                'isbn' => '978-6555124699',
                'imagem' => "dragon_ball_06.webp",
                'data_lancamento' => "2020-11-30",
                'qtd_estoque' => random_int(90, 200),
            ],
        ];
        foreach ($livros as $key => $value) {
            $result = array_merge($value, $conf);
            Livro::create($result);
        }
        // FIM SEED DRAGON BALL

        // SEED DR STONE
        $conf = [
            'autor' => 'Boichi',
            'preco' => 33.49,
            'paginas' => 192,
            'editora_id' => 2,
            'colecao_id' => 2,
        ];
        $livros = [
            [
                'titulo' => 'Dr. Stone Vol. 1',
                'resumo' => "Em um instante, todos os humanos do mundo viraram pedra. Este acontecimento misterioso envolveu o estudante Taiju e, depois de milhares de anos, ele e o seu amigo Senku despertam e decidem reconstruir a civilização do zero! E assim começa uma grande e única aventura de sobrevivência num mundo de ficção científica!",
                'isbn' => '978-8542614541',
                'imagem' => "dr_stone_01.webp",
                'data_lancamento' => "2018-10-04",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Dr. Stone Vol. 2',
                'resumo' => "Senku, Taiju e Yuzuriha partem em uma missão para fazer pólvora quando, de repente, avistam fumaça ao longe. Acreditando na existência de outras pessoas vivas, Senku assume correr um grande risco e faz um sinal de fumaça. Enquanto isso, Tsukasa continua perseguindo os três e quer impedir a fabricação de pólvora a qualquer custo.",
                'isbn' => '978-8542615395',
                'imagem' => "dr_stone_02.webp",
                'data_lancamento' => "2018-12-03",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Dr. Stone Vol. 3',
                'resumo' => "Senku vai para a vila da Kohaku com o intuito de conquistar todos os moradores. Primeiramente, ele transforma em seu assistente um jovem que o desafiou para um duelo de ciências. Agora, Senku parte em uma jornada para fazer uma panaceia que possa curar a doença da irmã da Kohaku. E assim começa o desafio para construir o reino da ciência!!!",
                'isbn' => '978-8542615401',
                'imagem' => "dr_stone_03.webp",
                'data_lancamento' => "2019-01-14",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Dr. Stone Vol. 4',
                'resumo' => "Senku e seus amigos trilham o roteiro da ciência pra fazer o remédio antibiótico, a sulfonamida. Eles seguem para uma área com alto risco de morte em busca do material mais difícil, o ácido sulfúrico! Enquanto isso, o dia do campeonato de artes marciais que vale o posto de chefe da vila está chegando…",
                'isbn' => '978-8542618433',
                'imagem' => "dr_stone_04.webp",
                'data_lancamento' => "2019-03-20",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Dr. Stone Vol. 5',
                'resumo' => "E começa o campeonato! Senku conduz o time do Reino da Ciência e a primeira luta será Kinrou versus Magma. Devido à miopia, Kinrou sofre no combate por conta da distância do oponente, mas assim que coloca “os olhos da ciência”, ele parte para a ofensiva! Nesta competição, Senku e seus amigos usarão o poder da ciência em busca da vitória!!",
                'isbn' => '978-8542619768',
                'imagem' => "dr_stone_05.webp",
                'data_lancamento' => "2019-05-20",
                'qtd_estoque' => random_int(90, 200),
            ],
        ];
        foreach ($livros as $key => $value) {
            $result = array_merge($value, $conf);
            Livro::create($result);
        }
        // FIM SEED DR STONE

        // SEED SPY X FAMILY
        $conf = [
            'autor' => 'Tatsuya Endo',
            'preco' => 29.90,
            'paginas' => 216,
            'editora_id' => 2,
            'colecao_id' => 3,
        ];
        $livros = [
            [
                'titulo' => 'Spy X Family Vol. 1',
                'resumo' => 'O habilidoso espião "Twilight" é instruído a construir uma "família" para se infiltrar em uma tradicional instituição de ensino. Mas a "filha" que ele encontra é uma paranormal que lê mentes! E a "esposa" é uma assassina?! Ocultando um do outro suas identidades, essa família temporária terá de enfrentar os perigos dos exames de admissão e do mundo em uma espirituosa comédia doméstica!!',
                'isbn' => '978-6555123036',
                'imagem' => "spy_family_01.webp",
                'data_lancamento' => "2020-09-15",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Spy X Family Vol. 2',
                'resumo' => 'Com a missão de proteger a paz entre Ostania e Westalis, a família Forger encara o desafio do Exame de Admissão de um renomado colégio. Porém, para se aproximar de Desmond, o alvo, Anya precisa se tornar uma Aluna Excelente!! Twilight então põe em prática o "Plano da Amizade"...?!',
                'isbn' => '978-6555123104',
                'imagem' => "spy_family_02.webp",
                'data_lancamento' => "2020-11-15",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Spy X Family Vol. 3',
                'resumo' => 'Yuri, o irmão de Yor, aparece na casa dos Forger para uma visita!! Escondendo as identidades de espião e agente da Polícia Secreta, Twilight e Yuri sondam as intenções um do outro. Até que Yuri, sempre parcial à própria irmã, exige uma prova de que ela e Twilight são realmente um casal...!!',
                'isbn' => '978-6555129021',
                'imagem' => "spy_family_03.webp",
                'data_lancamento' => "2021-01-11",
                'qtd_estoque' => random_int(90, 200),
            ],
            [
                'titulo' => 'Spy X Family Vol. 4',
                'resumo' => 'Um plano de assassinato de um ministro de Westalis usando cães-bomba vem à tona! A família Forger sai em busca de um cãozinho para Anya, mas Twilight acaba sendo chamado para participar de um plano de emergência a fim de impedir o atentado...!! Enquanto isso, Anya encontra um misterioso cão, que por algum motivo parece conhecer a sua família...?!',
                'isbn' => '978-6555127249',
                'imagem' => "spy_family_04.webp",
                'data_lancamento' => "2021-03-01",
                'qtd_estoque' => random_int(90, 200),
            ],
        ];
        foreach ($livros as $key => $value) {
            $result = array_merge($value, $conf);
            Livro::create($result);
        }
        // FIM SEED SPY X FAMILY

        // SEED HARRY POTTER
        $conf = [
            'autor' => 'J. K. Rowling',
            'preco' => 32.99,
            'editora_id' => 3,
            'colecao_id' => 4,
        ];
        $livros = [
            [
                'titulo' => 'Harry Potter e a Pedra Filosofal: 1',
                'resumo' => 'Harry Potter é um garoto cujos pais, feiticeiros, foram assassinados por um poderosíssimo bruxo quando ele ainda era um bebê. Ele foi levado, então, para a casa dos tios que nada tinham a ver com o sobrenatural. Pelo contrário. Até os 10 anos, Harry foi uma espécie de gata borralheira: maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha óculos remendados e era tratado como um estorvo.No dia de seu aniversário de 11 anos, entretanto, ele parece deslizar por um buraco sem fundo, como o de Alice no país das maravilhas, que o conduz a um mundo mágico. Descobre sua verdadeira história e seu destino: ser um aprendiz de feiticeiro até o dia em que terá que enfrentar a pior força do mal, o homem que assassinou seus pais.',
                'isbn' => '978-8532523051',
                'imagem' => "harry_potter_01.webp",
                'data_lancamento' => "2000-04-07",
                'qtd_estoque' => random_int(50, 115),
                'paginas' => 264,
            ],
            [
                'titulo' => 'Harry Potter e a Câmara Secreta: 2',
                'resumo' => 'Depois de férias aborrecidas na casa dos tios trouxas, está na hora de Harry Potter voltar a estudar. Coisas acontecem, no entanto, para dificultar o regresso de Harry. Persistente e astuto, nosso herói não se deixa intimidar pelos obstáculos e, com a ajuda dos fiéis amigos Weasley, começa o ano letivo na Escola de Magia e Bruxaria de Hogwarts. As novidades não são poucas. Novos colegas, novos professores, muitas e boas descobertas e...um grande e perigosos desafio. Alguém ou alguma coisa ameaça a segurança e a tranqüilidade dos membros de Hogwarts. Como eliminar definitivamente esse mal e restaurar a paz na escola?',
                'isbn' => '978-8532511669',
                'imagem' => "harry_potter_02.webp",
                'data_lancamento' => "2000-08-15",
                'qtd_estoque' => random_int(50, 115),
                'paginas' => 288,
            ],
            [
                'titulo' => 'Harry Potter e o Prisioneiro de Azkaban: 3',
                'resumo' => 'Mais uma vez suas férias na rua dos Alfeneiros, 4, foi triste e solitária. Tio Válter Dursley estava especialmente irritado com ele, porque seu amigo Rony Weasley tinha lhe telefonado. E ele não aceitava qualquer ligação de Harry com o mundo dos mágicos dentro de sua casa. A situação piorou ainda mais com a chegada de tia Guida, irmã de Válter. Harry já estava acostumado a ser humilhado pelos Dursley, mas quando tia Guida passou a ofender os pais de Harry, mortos pelo bruxo Voldemort, ele não agüentou e transformou-a num imenso balão. Irritado, fugiu da casa dos tios, indo se abrigar no Beco Diagonal. Lá ele reencontra Rony e Hermione, seus melhores amigos em Hogwarts e, para sua surpresa, é procurado pelo próprio Ministro da Magia. Sem que Harry saiba, o ministro está preocupado com o garoto, pois fugiu da prisão de Azkaban o perigoso bruxo Sirius Black, que teria assassinado treze pessoas com um único feitiço e traído os pais de Harry, entregando-os a Voldemort.',
                'isbn' => '978-1781103708',
                'imagem' => "harry_potter_03.webp",
                'data_lancamento' => "2000-11-28",
                'qtd_estoque' => random_int(50, 115),
                'paginas' => 348,
            ],
            [
                'titulo' => 'Harry Potter e o Cálice de Fogo: 4',
                'resumo' => 'O ano letivo já começa agitado. Harry volta para a Escola de Magia e Bruxaria de Hogwarts para cursar a quarta série. Acontecimentos inesperados ? como, por exemplo, a presença de um novo professor de Defesa contra as Artes das Trevas e um evento extraordinário promovido na escola ? alvoroçam os ânimos dos estudantes. Para surpresa de todos não haverá a tradicional Copa Anual de Quadribol entre Casas. Será substituída pelo Torneio Tribuxo, uma competição amistosa entre as três maiores escolas européias de bruxaria ? Hogwarts, Beauxbatons e Durmstrang ? que não se realizava havia um século.',
                'isbn' => '978-8532512529',
                'imagem' => "harry_potter_04.webp",
                'data_lancamento' => "2001-06-08",
                'qtd_estoque' => random_int(50, 115),
                'paginas' => 584,
            ],
        ];
        foreach ($livros as $key => $value) {
            $result = array_merge($value, $conf);
            Livro::create($result);
        }
        // FIM SEED HARRY POTTER
    }
}

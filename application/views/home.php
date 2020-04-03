<div id="header">
	<h1 class="title">Capítulo 6</h1>
	<h2 class="subtitle"><em>Alinhamento estrutural</em></h2>
	<p class="author"><em>Vitor Pimentel</em></p>
	<p class="date"><em>04 de abril de 2020</em></p>
	<hr>
	<p style="font-size: 10px; color:#777">Revisor teórico: Diego Mariano</p>
	<br>
</div>
<div id="introduction-to-productivity-tools" class="section level1">
	<!--<h1><span class="header-section-number">Capítulo 6</span> Alinhamento estrutural</h1>-->

	<p>
		Alinhamento estrutural, consiste na tentativa de encontrar semelhanças entre duas estruturas tridimensionais, de forma a gerar duas subestruturas que tenham o maior grau de similaridade possível, em geral, esse grau de similaridade é medido pela distância euclidiana entre os átomos correspondentes [1].</p><p>
A estrutura terciária de uma proteína está estritamente ligada à sua atividade biológica em uma célula [2]. Portanto, conhecer a estrutura das proteínas e poder encontrar equivalências nessas estruturas é um fator crucial no campo da biologia estrutural [2]. Uma vez que a evolução tende a conservar a estrutura [1], similaridades estruturais entre duas proteínas podem ser usadas como indícios de relações evolutivas ou funções comuns entre as estruturas sobrepostas [1]. Essas relações, por sua vez, são cruciais na predição da interação entre duas proteínas [4]. Frente a isso, algoritmos de modelagem e alinhamento estrutural eficientes são imprescindíveis dentro dessa área [3-4].</p><h3>
1.1 Avaliação de alinhamentos
</h3><p>Existe uma grande quantidade de algoritmos para alinhamento estrutural disponíveis. Assim, criar algoritmos novos e mais eficientes vem se tornando cada vez mais desafiador [4]. Esses diversos algoritmos acompanham diversas métricas para medir o alinhamento. Em geral, uma métrica bastante utilizada é o root-mean-square deviation (RMSD), que é calculado após a superposição das estruturas [3]:</p><code>
RMSD = √(1/N ∑_(n=1)^N δ_i^2 )</code><p>
(1)</p><p>
em que δ é a distância entre um átomo i e uma estrutura de referência.</p><p>
Algoritmos diferentes podem apresentar diferentes métricas que vão além do RMSD, como por exemplo, o LS-Align que utiliza a métrica LS-Score[5] e o TM Align, que utiliza o TM-Score [3]. O LS-Score é uma métrica que considera apenas informações estruturais das proteínas alinhadas, levando em consideração principalmente o número de átomos pesados nas estruturas, o número de pares de átomos alinhados, e a distância entre eles[5]. O TM-Score relaciona principalmente o tamanho das estruturas, o número de átomos alinhados, e a distância entre eles [3]. Ambas as métricas são normalizadas e possuem valores entre 0 e 1 [3-5]. Em geral, espera-se que a saída do algoritmo seja uma superposição que tenha o menor RMSD e a métrica própria do algoritmo que tenha o melhor valor possível [3-5].</p><h3>
2 Ferramentas para alinhamento estrutural</h3><p>
Nesta seção serão apresentadas as principais ferramentas para realização de alinhamento estrutural. São elas:</p><p>
<ul><li>TM Align
</li><li>Multiprot
</li><li>Mustang
</li><li>PyMOL</li></ul>
<h3>2.1 TM Align</h3>
<p>O TM Align é um algoritmo desenvolvido para identificar o melhor alinhamento possível entre um par de proteínas através de uma matriz de rotação construída com o TM-Score e programação dinâmica. Em geral, ele é mais rápido que os algoritmos DALI[7] e CE[8], que são muito usados, e seu resultado tem maior precisão e cobertura[3].</p><p>
O TM Align pode ser utilizado tanto online (webtool) quanto em ambiente desktop. Para utilizar a ferramenta, acesse a página <https://zhanglab.ccmb.med.umich.edu/TM-align/>, o link para download dos códigos-fonte se encontra logo abaixo da interface de utilização.</p><p>

Figura 1. Página inicial do TM-Align. Disponível em: <https://zhanglab.ccmb.med.umich.edu/TM-align/>. Acesso em 30 de março de 2020.</p><h3>
2.1.1 Utilização do TM Align Online</h3><p>
Essa forma de utilização é a mais simples. Nos campos em destaque, cole o arquivo da proteína no campo, em formato PDB ou PDBx/mmCIF, ou faça o upload do arquivo:</p><p>

Opcionalmente, os resultados podem ser enviados para o seu e-mail. Após clicar em Run TM-align, é exibida uma página com um resumo da execução e os arquivos do resultado disponíveis para download.
A seguir, está apresentado um exemplo de uso, alinhando as proteínas “Beta-Glucosidase de cupins neotermes” com ID 3VIK e “Beta-Glucosidase de fungos humícolas” com ID 4MDP, disponíveis no banco de dados do PDB:</p><p>

A saída apresenta um resumo da execução e uma visualização usando o Jsmol, além de links para o download dos arquivos de saída, como os arquivos de entrada, e os arquivos .pdb para visualizar a sobreposição no Resmol.</p><h3>


2.1.2 Execução local do TM Align</h3><p>
Para compilar e executar no Linux:</p><code>
>> g++ TMAlign.cpp -o tmalgin<br>
>> ./tmalign protein1.pdb protein2.pdb</code><p>

Em que protein1.pdb e protein2.pdb são o caminho das estruturas a serem alinhadas. O algoritmo itá rotacionar a primeira proteína passada para alinhá-la com a segunda. O resultado será mostrado na saída padrão, o programa conta com algumas configurações de execução, como por exemplo, o parâmetro -o, que gera arquivos de visualização no Rasmol e no Pymol e a estrutura que foi rotacionada escrita em formato PDB no diretório especificado após o parâmetro. Outro parâmetro interessante é o -fast, que gera um alinhamento mais rápido, em troca de um pouco de redução da precisão no resultado, existem muitos outros parâmetros, e as descrições podem ser encontradas no código fonte do programa.
Exemplo de uso com as proteínas de ID 3VIK e 4MDP, citadas anteriormente:</p><p>
>> ./tmalign 3vik.pdb 4mdp.pdb -o 3VIK_x_4MDP/Out</p><p>

Isso fará com que o TM Align alinhe as duas proteínas de exemplo e escreva o resultado dentro da pasta 3VIK_x_4MDP e os arquivos de saída sejam escritos com o nome “Out”:</p><p>

Tabela 1. Arquivos de Saída do TM Align para desktop Fonte: Código-fonte do Tm Align</p><p>
Nome do arquivo	Função
Out.pdb	Proteína rotacionada escrita em formato PDB
Out	Visualização dos traços sobrepostos de C-alpha nas regiões alinhadas no Resmol ou Pymol
Out_all	Visualização dos traços sobrepostos de C-alpha de todas as regiões no Resmol ou Pymol
Out_all_atm	Visualização de toda a sobreposição no Resmol ou Pymol
Out_all_atm_lig	Visualização de toda a sobreposição no Resmol ou Pymol, incluindo os ligantes
Out_atm	Visualização de toda a estrutura sobreposta das regiões alinhadas no Resmol ou Pymol
</p><p>
Com exceção do primeiro, Out.pdb, os arquivos estão com problemas de visualização no Pymol. O uso do TM Align pode ser automatizado através de qualquer linguagem de programação que tenha acesso aos comandos do sistema.
</p><h3>
2.2 Multiprot
</h3><p>
O Multiprot é um algoritmo de alinhamento estrutural um pouco diferente. Ele encontra equivalências geométricas nas moléculas de entrada, e portanto, nem todos os átomos das proteínas participam do alinhamento [9]. Essa técnica deixa o algoritmo muito mais eficiente que outros alinhadores estruturais, o algoritmo ainda pode alinhar até 4 estruturas ao mesmo tempo, sendo ainda mais eficiente[9]. Por outro lado, em arquivos de entrada muito diferentes, os alinhamentos tendem a ser menos precisos do que alinhadores normais.</p><h3>
2.2.1 Utilização do Multiprot</h3><p>
O Multiprot, executável em formato .Linux, pode ser baixado pelo site: http://bioinfo3d.cs.tau.ac.il/MultiProt/index_v1.6.html, conforme a imagem:</p><p>

Os arquivos do Multiprot estão compactados em formato .tar, após a extração, execute o arquivo multiprot.Linux que está dentro da pasta extraída:</p><code>>> ./multiprot.Linux protein1.pdb protein2.pdb protein3.pdb protein4.pdb</code><p>

Em que protein1.pdb, protein2.pdb, protein3.pdb e protein4.pdb são os caminhos para os arquivos em formato PDB das proteínas a serem alinhadas.</p><p>
O programa gera três arquivos de saída. O log_multiprot.txt, que contém os parâmetros utilizados no alinhamento e a saída do programa. O n_sol.res (em que “n” é o número de moléculas alinhadas), que contém o registro das equivalências, o programa pode gerar mais de uma possível solução para as equivalências, elas estão numeradas e escritas todas nesse mesmo arquivo. E por último, o n_sets.res (em que “n” é o número de moléculas alinhadas) contém uma lista com os fragmentos contíguos multiplamente alinhados.</p><p>
A seguir, está apresentado um exemplo de uso, alinhando as proteínas “Beta-Glucosidase de cupins neotermes” com ID 3VIK e “Beta-Glucosidase de fungos humícolas” com ID 4MDP, disponíveis no banco de dados do PDB:</p><code>

>> ./multiprot.Linux 3VIK.pdb 4MDP.pdb</code><p>

As saídas serão:</p><p>
O arquivo log_multiprot.txt, que contém os parâmetros e informações como por exemplo o tempo de execução e o tamanho da maior solução.</p><p>

O arquivo 2_sol.res irá conter os pares de átomos alinhados como equivalentes de todas as soluções, cada solução com seu respectivo número e RMSD, a imagem a seguir contém uma parte da solução número 0, e o cabeçalho do arquivo.</p><p>

O arquivo 2_sets.res gerado está ilustrado a seguir:</p><p>
<h3>
2.3 Mustang<br>
2.4 PyMOL<br>
Referências do capítulo</h3>
<p>
1-Approximate protein structural alignment in polynomial time. Rachel Kolodny, Nathan Linial Proceedings of the National Academy of Sciences Aug 2004, 101 (33) 12201-12206; DOI: doi.org/10.1073/pnas.0404383101
2-Antczak, M., Kasprzak, M., Lukasiak, P. et al. Structural alignment of protein descriptors – a combinatorial model. BMC Bioinformatics 17, 383 (2016). https://doi.org/10.1186/s12859-016-1237-9
3-Yang Zhang, Jeffrey Skolnick, TM-align: a protein structure alignment algorithm based on the TM-score, NUCLEIC ACIDS RESEARCH, Volume 33, Issue 7, 1 April 2005, Pages 2302–2309, https://doi.org/10.1093/nar/gki524
4-John Rozewicki, Songling Li, Karlou Mar Amada, Daron M Standley, Kazutaka Katoh, MAFFT-DASH: integrated protein sequence and structural alignment, Nucleic Acids Research, Volume 47, Issue W1, 02 July 2019, Pages W5–W10, https://doi.org/10.1093/nar/gkz342
5-Jun Hu, Zi Liu, Dong-Jun Yu, Yang Zhang, LS-align: an atom-level, flexible ligand structural alignment algorithm for high-throughput virtual screening, Bioinformatics, Volume 34, Issue 13, 01 July 2018, Pages 2209–2218, https://doi.org/10.1093/bioinformatics/bty081
6- https://zhanglab.ccmb.med.umich.edu/TM-align/(arquivo README e interface)
7-HOLM, Liisa; SANDER, Chris, Protein structure comparison by alignment of distance matrices, Journal of molecular biology, v. 233, n. 1, p. 123–138, 1993. DOI: https://doi.org/10.1006/jmbi.1993.1489
8-I N Shindyalov, P E Bourne, Protein structure alignment by incremental combinatorial extension (CE) of the optimal path., PROTEIN ENGINEERING, DESIGN AND SELECTION, Volume 11, Issue 9, Sep 1998, Pages 739–747, https://doi.org/10.1093/protein/11.9.739
9-Shatsky M., Nussinov R., Wolfson H.J. (2002) MultiProt — A Multiple Protein Structural Alignment Algorithm. In: Guigó R., Gusfield D. (eds) Algorithms in Bioinformatics. WABI 2002. Lecture Notes in Computer Science, vol 2452. Springer, Berlin, Heidelberg Doi https://doi.org/10.1007/3-540-45784-4_18
10-http://bioinfo3d.cs.tau.ac.il/MultiProt/index_v1.6.html (arquivo README)
</p>

	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat faucibus ligula. Mauris vel interdum quam, vestibulum iaculis sapien. <code>knitr</code> package. Phasellus pellentesque, odio eu euismod molestie, enim est placerat lacus, nec hendrerit elit odio nec lorem. Morbi sit amet ullamcorper quam. Integer vel ipsum tristique, vulputate sapien sit amet, auctor sem <em>Git</em>, Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <a href="#fn115" class="footnote-ref" id="fnref115"><sup>115</sup></a>, <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pharetra nunc commodo faucibus accumsan.</strong>.</p>
	<p>Aliquam augue nibh, ornare nec ante ut, sodales faucibus libero. Proin elementum neque enim, vel mollis ex dictum a. Fusce eu posuere diam<a href="#fn116" class="footnote-ref" id="fnref116"><sup>116</sup></a>. Interdum et malesuada fames ac ante ipsum primis in faucibus: <a href="#">google.com.br</a>.</p>

</div>

<div class="footnotes">
	<hr>
	<ol start="115">
	<li id="fn115"><p><a href="http://github.com" class="uri">http://github.com</a><a href="introduction-to-productivity-tools.html#fnref115" class="footnote-back">↩</a></p></li>
	<li id="fn116"><p><a href="https://www.rstudio.com/" class="uri">https://www.rstudio.com/</a><a href="introduction-to-productivity-tools.html#fnref116" class="footnote-back">↩</a></p></li>
	</ol>
</div>
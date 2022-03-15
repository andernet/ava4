CREATE TABLE `conteudo_curricular` (
  `disciplina` varchar(250) NOT NULL,
  `carga_horaria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `conteudo_curricular` (`disciplina`, `carga_horaria`) VALUES
('FASE EAD', '40h'),
('SINTAER', '2h'),
('LIGAÇÕES EXTERNAS AO SINTAER', '3h'),
('ATIVIDADE DE INTELIGÊNCIA DA FAB', '2h'),
('PENSAMENTO CRÍTICO NA ANÁLISE DE INTELIGÊNCIA', '2h'),
('DESAFIOS PARA O ANALISTA DE INTELIGÊNCIA', '3h'),
('TECNICAS ANALÍTICAS ESTRUTURADAS', '4h'),
('RELAÇÕES INTERNACIONAIS', '3h'),
('CONJUNTURA NA AMÉRICA DO SUL', '6h'),
('MÉTODO DE PRODUÇÃO DO CONHECIMENTO', '4h'),
('EXERCÍCIO ORIENTADO DE PLANEJAMENTO E ANÁLISE', '3h'),
('CONHECIMENTO INFORME/ INFORMAÇÃO – TEORIA/ EXERCÍCIOS', '14h'),
('OSINT (OPEN SOURCE INTELIGENCE)', '3h'),
('INFLUÊNCIA DA RÚSSIA E CHINA NA AMÉRICA LATINA', '4h'),
('CONHECIMENTO APRECIAÇÃO – TEORIA/ - EXERCÍCIOS/ APRESENTAÇÃO INDIVIDUAL', '20h'),
('ANÁLISE DE PROPAGANDA ADVERSA', '6h'),
('AUTORES CLÁSSICOS DE INTELIGÊNCIA', '2h'),
('ATIVIDADE DE OPERAÇÕES DE INTELIGÊNCIA', '2h'),
('CONTRAINTELIGÊNCIA- SEGURANÇA ORGÂNICA', '2h'),
('CONTRAINTELIGÊNCIA – SEGURANÇA ATIVA', '2h'),
('GEOPOLÍTICA NO ORIENTE MÉDIO', '2h'),
('PLANO DE INTELIGÊNCIA DA AERONÁUTICA (PIAER)', '2h'),
('INTELIGÊNCIA CIBERNÉTICA', '6h'),
('ATIVIDADES ADMINISTRATIVAS', '3h'),
('TOTAL', '140h');



CREATE TABLE `lista_alunos` (
  `tratamento` varchar(2) NOT NULL,
  `posto` varchar(50) NOT NULL,
  `quadro` varchar(50) NOT NULL,
  `especialidade` varchar(50) NOT NULL,
  `nome_aluno` varchar(50) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `om` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `saram` varchar(50) NOT NULL,
  `grande_comando` varchar(50) NOT NULL,
  `cod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `lista_alunos` (`tratamento`, `posto`, `quadro`, `especialidade`, `nome_aluno`, `periodo`, `curso`, `om`, `cpf`, `saram`, `grande_comando`, `cod`) VALUES
('o', 'CL', 'QOEFOT', 'NTE', 'PAULO GILVANE DA COSTA', 'ainda falta', 'Curso de analise de inteligência – CAI 2021', 'COMAE', '587.357.980-68', '357.130-0', 'COMAE', '326f2a6f1aa13a5e1dbccd15fb00cae9');
COMMIT;

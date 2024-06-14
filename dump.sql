--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.3 (Homebrew)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.category (id, name, slug, created_at, updated_at, thumbnail, description) FROM stdin;
7	Nos champagnes	champagne	2024-05-27 13:52:34	2024-05-28 13:28:12	photo-1635715070096-b4655b94edee.avif	LLLorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore facere provident molestias ipsam sint voluptatum pariatur.
5	Nos rouges	red	2024-05-27 13:48:08	2024-06-14 11:12:18	photo-1548025396-689d647d00c5-1716890309.avif	Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore facere provident molestias ipsam sint voluptatum pariatur.
6	Nos blancs	white	2024-05-27 13:49:44	2024-06-14 11:13:45	photo-1562601579-599dec564e06.avif	LLorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore facere provident molestias ipsam sint voluptatum pariatur.
\.


--
-- Data for Name: grape_variety; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.grape_variety (id, name, slug, status, thumbnail, plot, created_at, updated_at) FROM stdin;
3	Albarossa	albarossa	frozen	photo-1635715070096-b4655b94edee.avif	<div>Albarossa</div>	2024-05-27 10:59:32	2024-06-13 13:24:12
\.


--
-- Data for Name: supplier; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.supplier (id, name, slug, thumbnail, status, plot, created_at, updated_at) FROM stdin;
1	ATOM-ent.	atom-ent	photo-1635715070096-b4655b94edee.avif	available	<div>Atom</div>	2024-05-27 11:17:48	2024-06-13 13:24:23
\.


--
-- Data for Name: wine; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.wine (id, category_id, supplier_id, title, slug, status, thumbnail, plot, isbn, country, region, created_at, updated_at, grape_variety_id, price) FROM stdin;
6	5	1	Saint-Estèphe 2018	asdf-asdfasdf	available	Saint-Estèphe-2018.png	<div>Confidentiel Cru Bourgeois de seulement 15 hectares et implanté au cœur de la mythique appellation Saint-Estèphe, le Château Tour des Termes a su s'entourer des meilleurs ! Conseillé depuis peu par le talentueux Hubert de Boüard, le domaine a donné naissance à un millésime 2018 qui alliera opulence, complexité, gras et tanins satinés. « Superbe vin, tout est là, le nez est expressif, l'attaque est encore franche mais c'est normal, ample en bouche et longue finale épicée. », « Un vin qui fait poésie dans le verre. » ou encore « Magnifique vin , avec une finesses en bouche » sont quelques avis laissés par les membres de notre communauté Vivino ! Le célèbre critique James Suckling l'a noté 93/100 et a aimé ce vin « juteux, d'un bel équilibre et avec une finale expressive ». Quant au Guide Bettane+Desseauve, il a conclu qu'il était « un vrai saint-estèphe doté d’une fraîcheur magnifique ». Vrai vin de gastronomie, il saura relevé vos plus beaux plats de Noël comme un civet de chevreuil mariné façon grand veneur. Attention, qui dit appellation d'élite dit stock limité...<br><br><br></div>	3432780015283	FR	Bordeaux	2024-06-03 10:50:04	2024-06-13 16:19:04	3	2295
7	6	1	Côtes de Gascogne Premières Grives 2023	cotes-de-gascogne-premieres-grives-2023	available	cotes-de-gascogne-premiers-grives-2023.png	<div>Velit cillum aliqua reprehenderit commodo nulla deserunt excepteur quis sint consequat Lorem ad veniam. Occaecat aliquip ipsum sint exercitation mollit irure amet do. Velit consectetur consequat anim laborum excepteur labore reprehenderit laboris sit et esse fugiat cupidatat eiusmod consequat. Minim nisi nulla exercitation sint. Cillum ad laborum magna do ea aliqua consequat excepteur adipisicing laborum velit non nulla. Anim aliquip consectetur occaecat ut dolor quis tempor amet incididunt adipisicing et ut ullamco et fugiat.</div>	3256226790776	FR	Bordeaux	2024-06-14 10:53:08	2024-06-14 10:53:08	3	2330
8	7	1	Blanc de Blancs Champagne N.V.	blanc-de-blancs-champagne-nv	available	blanc-de-blancs-champagne-nv.png	<div>Qui ullamco ipsum labore pariatur veniam magna irure ad incididunt. Ipsum excepteur veniam adipisicing Lorem cupidatat. Deserunt nulla nisi nostrud consectetur officia. Aliquip mollit ullamco qui aliquip in reprehenderit cillum adipisicing ea. Adipisicing sint sunt minim labore ut laboris aliqua sunt veniam et commodo in. Cupidatat duis id ea elit anim qui dolor elit commodo sunt est. Enim consequat minim ipsum dolor nulla sint quis voluptate velit.</div>	3250392611569	FR	Bordeaux	2024-06-14 10:55:29	2024-06-14 10:55:29	3	3195
\.


--
-- Data for Name: box; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.box (id, wine_id, name, slug, thumbnail, status, plot, created_at, updated_at, price) FROM stdin;
1	6	Sélection de vins pour les soirées d'automne	box-for-automn	dave-lastovskiy-rygidtavhkq-unsplash-1718354027.jpg	available	<div>Aliquip quis consequat exercitation mollit enim esse incididunt cupidatat. Cillum adipisicing pariatur excepteur nisi nostrud occaecat. Deserunt magna id labore id consectetur Lorem sint nisi. Laborum tempor amet esse et do do aliqua mollit aliqua aliquip qui reprehenderit laborum elit.</div>	2024-05-27 11:21:59	2024-06-14 10:53:30	4023
32	6	Sélection de vins de tante	selection-de-vins-de-tante	zachariah-hagy-9ngnd9o-djm-unsplash-1718353902.jpg	available	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid dolorem fugit magnam nesciunt officia praesentium. Ab, accusamus cumque dolore ducimus itaque labore laborum magni molestiae neque possimus saepe, temporibus.</div><div><br></div>	2024-06-14 10:31:33	2024-06-14 10:31:42	5643
33	6	Vins spéciaux	vins-speciaux	marco-mornati-zcoujerul-m-unsplash-1718354117.jpg	available	<div>Velit cillum aliqua reprehenderit commodo nulla deserunt excepteur quis sint consequat Lorem ad veniam. Occaecat aliquip ipsum sint exercitation mollit irure amet do. Velit consectetur consequat anim laborum excepteur labore reprehenderit laboris sit et esse fugiat cupidatat eiusmod consequat. Minim nisi nulla exercitation sint. Cillum ad laborum magna do ea aliqua consequat excepteur adipisicing laborum velit non nulla. Anim aliquip consectetur occaecat ut dolor quis tempor amet incididunt adipisicing et ut ullamco et fugiat.</div>	2024-06-14 10:35:17	2024-06-14 10:53:22	14000
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20240524074932	2024-05-24 07:49:50	90
DoctrineMigrations\\Version20240524080258	2024-05-24 08:03:02	40
DoctrineMigrations\\Version20240524092045	2024-05-24 09:20:49	3
DoctrineMigrations\\Version20240527114100	2024-05-27 11:41:02	8
DoctrineMigrations\\Version20240531121755	2024-05-31 12:18:08	18
DoctrineMigrations\\Version20240531123618	2024-05-31 12:36:24	27
DoctrineMigrations\\Version20240531133612	2024-05-31 13:36:18	26
\.


--
-- Data for Name: messenger_messages; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.messenger_messages (id, body, headers, queue_name, created_at, available_at, delivered_at) FROM stdin;
\.


--
-- Data for Name: tag; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.tag (id, name, slug, thumbnail, created_at, updated_at, status, plot) FROM stdin;
2	automn	automn	photo-1635715070096-b4655b94edee.avif	2024-05-27 11:40:20	2024-06-13 13:24:32	available	<div>atoumn</div>
\.


--
-- Data for Name: tag_box; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.tag_box (tag_id, box_id) FROM stdin;
\.


--
-- Data for Name: tag_wine; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.tag_wine (tag_id, wine_id) FROM stdin;
\.


--
-- Name: box_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.box_id_seq', 33, true);


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.category_id_seq', 20, true);


--
-- Name: grape_variety_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.grape_variety_id_seq', 4, true);


--
-- Name: messenger_messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.messenger_messages_id_seq', 1, false);


--
-- Name: supplier_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.supplier_id_seq', 1, true);


--
-- Name: tag_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.tag_id_seq', 2, true);


--
-- Name: wine_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.wine_id_seq', 8, true);


--
-- PostgreSQL database dump complete
--


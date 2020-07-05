
-- categories

INSERT INTO `categories`(`categoryname`, `categorydesc`, `categoryslug`, `created_at`, `updated_at`) VALUES
('Laundry', 'Laundry', 'Laundry', '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Insecticide', 'Insecticide', 'Insecticide',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Air Freshner', 'Air Freshner', 'Air-Freshner',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Provisions', 'Provisions', 'Provisions',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Cloth', 'Cloth', 'Cloth',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Drinks', 'Drinks', 'Drinks',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Biscuits', 'Biscuits', 'Biscuits',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Sweets', 'Sweets', 'Sweets',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Food', 'Food', 'Food',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Tea', 'Tea', 'Tea',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Faaajs', 'Faaajs', 'Faaajs',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Noodles', 'Noodles', 'Noodles',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Baby Care', 'Baby Care', 'Baby-Care',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Yoghurts', 'Yoghurts', 'Yoghurts',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Detergent', 'Detergent', 'Detergent',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Make Up', 'Make Up', 'Make-Up',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Body Spray and Perfume', 'Body Spray and Perfume', 'Body-Spray-and-Perfume',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29'),
('Body Treatment and Cream', 'Body Treatment and Cream', 'Body-Treatment-and-Cream',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29');


-- inventories
INSERT INTO `inventories`(`productname`, `productdescription`, `productcategory`, `productuom`, `sellingprice`, `buyingprice`, `profit`, `enteredby`, `productqty`, `productremain`, `productslug`,  `created_at`, `updated_at`,`reorderlevel`) VALUES
('morning fresh 100ml',	'morning fresh 100ml',	'Laundry',	'unit',	750,	634,	116,	'Faaajs Admin',	'11',	'11',	'morning-fresh-100ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('just tub and tiles 1litre', 'just tub and tiles 1litre', 'Laundry',	'unit',	550,	450,	100,	'Faaajs Admin',	'6',	'6',	'just-tub-and-tiles-1litre',  '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),
('harpic 450ml','harpic 450ml',	'Laundry',	'unit',	750, 650, 100,	'Faaajs Admin',	'9', '9',		'harpic-450ml',	'2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),
('sani fresh 750ml',	'sani fresh 750ml',	'Laundry',	'unit',	850,	750,	100,	'Faaajs Admin',	'9', '9',		'sani-fresh-750ml',	'2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('mortein insta 600ml',	'mortein insta 600ml',	'Insecticides',	'unit',	1500,	1359,	141	,'Faaajs Admin',	'10',	'10', 'mortein-insta-600ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('read 4 dream insta 600ml',	'read 4 dream insta 600ml',	'Insecticides',	'unit',	1000,	800,	200,	'Faaajs Admin',	'2',	'2',	'read-4-dream-insta-600ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29',	'0'),
('soldat pioneer anti malaria 120g',	'soldat pioneer anti malaria 120g'	,'Insecticides',	'unit',	150,100,	50,	'Faaajs Admin',	'7',	'7',	'soldat-pioneer-anti-malaria-120g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('astonish wash up 600ml', 	'astonish wash up 600ml', 	'Laundry',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1', 'astonish-wash-up-600ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),

('harpic power plus max10',	'harpic power plus max10',	'Laundry',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'2',	'2', 'harpic-power-plus-max10', '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),

('merito easy ironing 500ml',	'merito easy ironing 500ml',	'Laundry',	'unit',	1000,	850,	150,'Faaajs Admin',	'8',	'8', 'merito-easy-ironing-500ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),

('motein insta 400ml',	'motein insta 400ml'	,'Insecticides',	'unit',	1000,	792,	208,	'Faaajs Admin',	'6',	'6', 'motein-insta-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),

('air wick 250'	,'air wick 250',	'Air Freshner',	'unit',	2500,	1834,	666,	'Faaajs Admin',	'3',	'3','air-wick-250', '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),

('charm automatic spray 250ml',	'charm automatic spray 250ml',	'Air Freshner',	'unit',	1500,	1350,	150,'Faaajs Admin',	'1',	'1',	'charm-automatic-spray-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),
('good morning corn flakes 450g', 	'good morning corn flakes 450g', 	'Provision',	'unit',	1000,	913,87,	'Faaajs Admin',	'8',	'8',	'good-morning-corn-flakes-450g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('nasco corn flakes 350g', 	'nasco corn flakes 350g', 	'Provision',	'unit',	900,	670, 230,	'Faaajs Admin',	'4',	'4','nasco-corn-flakes-350g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29','0'),

('infinity corn flakes 350g',	'infinity corn flakes 350g',	'Provision',	'unit',	750,	530,	220,	'Faaajs Admin',	'10',	'10',		'infinity-corn-flakes-350g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29',	'0'),

('kelloggs corn flakes',	'kelloggs corn flakes',	'Provision',	'unit',	850,	570,	280,	'Faaajs Admin',	'8',	'8',	'kelloggs-corn-flakes', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('SMA Gold 6-12 month 400g'	,'SMA Gold 6-12 month 400g',	'Provision',	'unit',	3100,	2834,	266,	'Faaajs Admin',	'3',	'3',		'SMA-Gold-6-12-month-400g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nestle NAN optipro 400g',	'nestle NAN optipro 400g',	'Provision',	'unit',	2300,	2084,	216,	'Faaajs Admin','3','3',	'nestle-NAN-optipro-400g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('oluji pure cocoa powder 250g',	'oluji pure cocoa powder 250g',	'Provision',	'unit',	750,	650,	100,	'Faaajs Admin',	'7','7',	'oluji-pure-cocoa-powder-250g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Nestle Cerelac Maize 1kg',	'Nestle Cerelac Maize 1kg',	'Provision',	'unit',	2500,	2350,	150,	'Faaajs Admin',	'1','1',	'Nestle-Cerelac-Maize-1kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Nestle Cerelac Wheat 1kg',	'Nestle Cerelac Wheat 1kg',	'Provision',	'unit',	2700,	2500,	200,	'Faaajs Admin',	'6',	'6', 'Nestle-Cerelac-Wheat-1kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('checkers custard powder banana flavor',	'checkers custard powder banana flavor',	'Provision',	'unit',	1700,	1467,	233,	'Faaajs Admin',	'3','3',	'checkers-custard-powder-banana-flavor', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('SMA Gold 900g','SMA Gold 900g',	'Provision',	'unit',	6000,	5584,	416,	'Faaajs Admin',	'5',	'5',	'SMA-Gold-900g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('peak infact cerealsrice with milk 250g',	'peak infact cerealsrice with milk 250g',	'Provision',	'unit',	1200,	867,	333,	'Faaajs Admin',	'19',	'19',		'peak-infact-cerealsrice-with-milk-250g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('peak infact cerealsrice with wheat 250g',	'peak infact cerealsrice with wheat 250g',	'Provision',	'unit',	1200,	867,	333,	'Faaajs Admin',	'13','13',	'peak-infact-cerealsrice-with-wheat-250g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nestle lactogen 400g', 	'nestle lactogen 400g', 	'Provision',	'unit',	1600,	1350,	250,	'Faaajs Admin',	'1','1',	'nestle-lactogen-400g' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('my boy eldorin 400g',	'my boy eldorin 400g',	'Provision',	'unit',	1600,	1375,	225,	'Faaajs Admin',	'7',	'7',		'my-boy-eldorin-400g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('frisco Gold 300g',	'frisco Gold 300g',	'Provision',	'unit',	1700,	1500,	200,	'Faaajs Admin',	'8',	'8',		'frisco-Gold-300g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('checker custard 3in1 milk powder 1.5kg',	'checker custard 3in1 milk powder 1.5kg',	'Provision',	'unit',	2100,	1934,	166,	'Faaajs Admin',	'4',	'4',		'checker-custard-3in1-milk-powder-1.5kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('bolero custard powder 2kg',	'bolero custard powder 2kg',	'Provision',	'unit',	1500,	1350,	150,	'Faaajs Admin',	'4',	'4',		'bolero-custard-powder-2kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('lady B 2kg',	'lady B 2kg',	'Provision',	'unit',	1600,	1300,	300,	'Faaajs Admin',	'4','4',	'lady-B-2kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('checker custard powder vanilla flavor 2kg'	,'checker custard powder vanilla flavor 2kg'	,'Provision',	'unit',	1700,	1467,	233,	'Faaajs Admin',	'4','4'	, 'checker-custard-powder-vanilla-flavor-2kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('lady B custard powder 500g','lady B custard powder 500g',	'Provision','unit',	550,	450,	100,	'Faaajs Admin',	'4',	'4',	'lady-B-custard-powder-500g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('checker Milk custard 3in1 400g',	'checker Milk custard 3in1 400g',	'Provision',	'unit',	700,	600,	100,	'Faaajs Admin',	'9',	'9',		'checker-Milk-custard-3in1-400g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('bolero custard powder 454g',	'bolero custard powder 454g',	'Provision',	'unit',	500,	400,	100,	'Faaajs Admin',	'6',	'6',		'bolero-custard-powder-454g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('checkers custard powder Vanilla 400g',	'checkers custard powder Vanilla 400g',	'Provision',	'unit',	600,	500,	100,	'Faaajs Admin',	'12',	'12',		'checkers-custard-powder-Vanilla-400g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('sure motion sense 250ml',	'sure motion sense 250ml'	,'Body Spray and Perfume',	'unit',	1000,	605,	395,	'Faaajs Admin',	'10',	'10',	'sure-motion-sense-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('malizia 175ml',	'malizia 175ml'	,'Body Spray and Perfume',	'unit',	1000,	734,	266,	'Faaajs Admin',	'7',	'7',	'malizia-175ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0');



-- end of 1st done

('adidas anti perspirant 150ml',	'adidas anti perspirant 150ml','Body Spray and Perfume',	'unit',	1000,	850,	150,	'Faaajs Admin',	'28',	'28',		'adidas-anti-perspirant-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('sure men perspirant 250ml',	'sure men perspirant 250ml'	,'Body Spray and Perfume',	'unit',	1000,	800,	200,	'Faaajs Admin',	'10',	'10',		'sure-men-perspirant-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('extract herbal soap 125g',	'extract herbal soap 125g',	'Laundry',	'unit',	550,	450,	100,	'Faaajs Admin',	'23','23',	'extract-herbal-soap-125g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('adidas 6in1 anti perspirant 150ml',	'adidas 6in1 anti perspirant 150ml'	,'Body Spray and Perfume',	'unit',	1000,	800,	200,	'Faaajs Admin',	'15','15',	'adidas-6in1-anti-perspirant-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Fa men anti perspirant 200ml',	'Fa men anti perspirant 200ml'	,'Body Spray and Perfume',	'unit',	950,	700,	250,	'Faaajs Admin',	'4',	'4',	'Fa-men-anti-perspirant-200ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Fa sport 200ml',	'Fa sport 200ml'	,'Body Spray and Perfume',	'unit',	600,	450,	150,	'Faaajs Admin',	'3',	'3',		'Fa-sport-200ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('adidas Doe body spray 150ml',	'adidas Doe body spray 150ml'	,'Body Spray and Perfume',	'unit',	600,	450,	150,	'Faaajs Admin',	12,	12,		'adidas-Doe-body-spray-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('red cherry eye lashes',	'red cherry eye lashes','Make Up','unit',	200,	150,	50,	'Faaajs Admin',	'1',	'1',	'red cherry eye lashes', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('dream make up', 	'dream make up' ,	'Make Up',	'unit',	350,	250,	100,	'Faaajs Admin',	'1',	'1',		'dream-make-up' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('make up box',	'make up box',	'Make Up',	'unit',	8500,	7000,	1500,	'Faaajs Admin',	'1',	'1',		'make-up-box', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('bio oil 60ml',	'bio oil 60ml', 'Body Spray and Perfume',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',	'bio-oil-60ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Dr Rashel 130ml',	'Dr Rashel 130ml'	,'Body Treatment and Cream',	'unit',	2500,	2200,	300,	'Faaajs Admin',	'1',	'1'	,	'Dr-Rashel-130ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Dr Rashel Anti Wrinkle 50ml',	'Dr Rashel Anti Wrinkle 50ml'	,'Body Treatment and Cream',	'unit',	2500,	2200,	300,	'Faaajs Admin',	'1',	'1',	'Dr-Rashel-Anti-Wrinkle-50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('5in1 beauty care massager',	'5in1 beauty care massager'	,'Body Spray and Perfume',	'unit',	1700,	1500,	200,	'Faaajs Admin',	'1',	'1', '5in1-beauty-care-massager', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('p-care face cream',	'p-care face cream'	,'Body Treatment and Cream',	'unit',	700,	500,	200,	'Faaajs Admin',	'1',	'1',		'p-care-face-cream', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('M3 shirley cream 50grs', 	'M3 shirley cream 50grs','Body Treatment and Cream',	'unit',	700,	500,	200,	'Faaajs Admin',	'1',	'1', 'M3-shirley-cream-50grs' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Abana facial cream 25ml',	'Abana facial cream 25ml'	,'Body Treatment and Cream',	'unit',	700,	500,	200,	'Faaajs Admin',	'1',	'1', 'Abana-facial-cream-25ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('romatic beauty cosmetics lip gloss',	'romatic beauty cosmetics lip gloss','Body Treatment and Cream',	'unit',	200,	150,	50,	'Faaajs Admin',	'10',	'10',	'romatic-beauty-cosmetics-lip-gloss', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Dr rashel stretch mark cream 150g','Dr rashel stretch mark cream 150g'	,'Body Treatment and Cream',	'unit',	1700,	1500,	200,	'Faaajs Admin',	'1',	'1',	'Dr-rashel-stretch-mark-cream-150g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('fem fresh soap wash 150g',	'fem fresh soap wash 150g',	'Laundry',	'unit',	800,	650,	150,	'Faaajs Admin',	'1',	'1',		'fem-fresh-soap-wash-150g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('212 smokers extra hard',	'212 smokers extra hard','Health Care', 'unit',	100, 85,	15,	'Faaajs Admin', '0', '0', '212-smokers-extra-hard', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('USA K Brother carrot soap 100g',	'USA K Brother carrot soap 100g',	'Laundry',	'unit',	450,	350,	100,	'Faaajs Admin',	'46',	'46',	'USA-K-Brother-carrot-soap-100g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('morning fresh 450ml',	'morning fresh 450ml',	'Laundry',	'unit',	400,	306,	94,	'Faaajs Admin',	'17','17',	'morning-fresh-450ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Palmers cocoa butter formula 500ml',	'Palmers cocoa butter formula 500ml', 'Body Treatment and Cream',	'unit',	2500,	2000,	500,	'Faaajs Admin',	'6','6',	'Palmers-cocoa-butter-formula-500ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('sportin waves 99.2g',	'sportin waves 99.2g', 'Body Treatment and Cream',	'unit',	1200,1000,	200,	'Faaajs Admin',	'10',	'10',	'sportin-waves-99.2g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Razorless cream shave 170g',	'Razorless cream shave 170g','Body Treatment and Cream',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'6','6',	'Razorless-cream-shave-170g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('sode pommaade 120ml',	'sode pommaade 120ml'	,'Body Treatment and Cream',	'unit',	800,	600,	200,'Faaajs Admin',	'2',	'2',	'sode-pommaade-120ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('karina pommade 959g',	'karina pommade 959g', 'Body Treatment and Cream',	'unit',	800,	600,	200,	'Faaajs Admin',	'1',	'1',	'karina-pommade-959g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('dettol anti bacterial skin jelly 160g',	'dettol anti bacterial skin jelly 160g'	,'Body Treatment and Cream',	'unit',	1000,	800,	200,	'Faaajs Admin',	'6',	'6',		'dettol-anti-bacterial-skin-jelly-160g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('nycil baby lotion',	'nycil baby lotion'	,'Body Treatment and Cream',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',		'nycil-baby-lotion', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('dettol soap original anti bacterial 55g',	'dettol soap original anti bacterial 55g'	,'Body Treatment and Cream',	'unit',	120,	87,	33,	'Faaajs Admin',	'81',	'81',		'dettol-soap-original-anti-bacterial-55g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0')
('dettol best ever cool 110g',	'dettol best ever cool 110g'	,'Body Treatment and Cream',	'unit',	300,	238,	62,	'Faaajs Admin',	'85',	'85',	'dettol-best-ever-cool-110g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Tura 65g',	'Tura 65g'	,'Body Treatment and Cream','unit',	150,	120,	30,	'Faaajs Admin',	'12',	'12',		'Tura-65g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('eva Soap 150g',	'eva Soap 150g'	,'Body Treatment and Cream',	'unit',	200,	163,	37,	'Faaajs Admin',	'83',	'83',	'eva-Soap-150g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('julie beauty soap 150g', 	'julie beauty soap 150g' 	,'Body Treatment and Cream',	'unit',	50,	30,	20,	'Faaajs Admin',	'33',	'33',		'julie beauty soap 150g' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('irish spring 100g',	'irish spring 100g'	,'Body Treatment and Cream',	'unit',	350,	250,	100,	'Faaajs Admin',	'49',	'49',	'irish-spring-100g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('lux Soap touch 65g',	'lux Soap touch 65g',	'Laundry',	'unit',	100,	90,	10,	'Faaajs Admin',	'110',	'110',	'lux-Soap-touch-65g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('malizia cream soap 75g',	'malizia cream soap 75g',	'Laundry',	'unit',	100,	90,	10,	'Faaajs Admin',	'12',	'12',		'malizia-cream-soap-75g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('classic white savon 75g',	'classic white savon 75g',	'Laundry',	'unit',	100,	90,	10,	'Faaajs Admin',	'1',	'1',		'classic-white-savon-75g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Nivea natural fairness 400ml',	'Nivea natural fairness 400ml','Body Spray and Perfume','unit',	1800,	1600,	200,	'Faaajs Admin',	'2',	'2',		'Nivea-natural-fairness-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea express hydration 400ml',	'nivea express hydration 400ml'	,'Body Spray and Perfume',	'unit',	1800,	1600,	200,	'Faaajs Admin',	'2',	'2',		'nivea-express-hydration-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea smooth sensation 400ml',	'nivea smooth sensation 400ml'	,'Body Spray and Perfume',	'unit',	1800,	1600,	200,	'Faaajs Admin',	'4',	'4',		'nivea-smooth-sensation-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea shea smooth 400ml',	'nivea shea smooth 400ml', 'Body Spray and Perfume',	'unit',	1800,	1600,	200,	'Faaajs Admin',	'3',	'3',		'nivea-shea-smooth-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea invisible 150ml',	'nivea invisible 150ml'	,'Body Spray and Perfume',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',	'nivea-invisible-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea fresh natural 150ml',	'nivea fresh natural 150ml'	,'Body Spray and Perfume',	'unit',	1000,	800,	200,	'Faaajs Admin',	'1',	'1',		'nivea-fresh-natural-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea men black and white 150ml',	'nivea men black and white 150ml', 'Body Spray and Perfume',	'unit',	1000,	800,	200,	'Faaajs Admin',	'1',	'1',		'nivea-men-black-and-white-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea men dry impact 150ml',	'nivea men dry impact 150ml'	,'Body Spray and Perfume',	'unit',	1000,	800,	200,	'Faaajs Admin',	'6',	'6',	'nivea-men-dry-impact-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea men silver protect 150ml',	'nivea men silver protect 150ml'	,'Body Spray and Perfume',	'unit',	1000,	800,	200,	'Faaajs Admin',	'6',	'6',	'nivea-men-silver-protect-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea dry comfort 50ml',	'nivea dry comfort 50ml', 'Body Spray and Perfume',	'unit',	600,	500,	100,	'Faaajs Admin',	'3',	'3',		'nivea-dry-comfort-50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nivea roll on 50ml',	'nivea roll on 50ml'	,'Body Spray and Perfume',	'unit',	600,	500,	100,	'Faaajs Admin',	'23',	'23',	'nivea-roll-on-50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('romano roll on 50ml',	'romano roll on 50ml'	,'Body Spray and Perfume',	'unit',	600,	500,	100,	'Faaajs Admin',	'3',	'3',	'romano-roll-on-50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('enchanteur 50ml',	'enchanteur 50ml', 'Body Spray and Perfume',	'unit',	600,	500,	100,	'Faaajs Admin',	'8',	'8',		'enchanteur 50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('pears baby oil 200ml',	'pears baby oil 200ml'	,'Body Spray and Perfume',	'unit',	500,	400,	100,	'Faaajs Admin',	'9',	'9',		'pears-baby-oil-200ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('IDOLE 250ml',	'IDOLE 250ml'	,'Body Spray and Perfume',	'unit',	750,	650,	100,	'Faaajs Admin',	'2',	'2',		'IDOLE-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Pears Olive oil 125g',	'Pears Olive oil 125g'	,'Body Spray and Perfume',	'unit',	200,	150,	50,	'Faaajs Admin',	'5',	'5',		'Pears-Olive-oil-125g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('pure white 400ml',	'pure white 400ml','Body Treatment and Cream',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',		'pure-white-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('cocoderm 300ml',	'cocoderm 300ml'	,'Body Treatment and Cream',	'unit',	500,	350,	150,	'Faaajs Admin',	'1',	'1',	'cocoderm-300ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('enchanteur 250ml',	'enchanteur 250ml'	,'Body Treatment and Cream',	'unit',	1000,	800,	200,	'Faaajs Admin',	'1',	'1',	'enchanteur-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('dove fair body smoth 400ml','dove fair body smoth 400ml'	,'Body Treatment and Cream','unit',	800,	650,	150,	'Faaajs Admin',	'3',	'3',	'dove-fair-body-smoth-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),


('Enchanteur 425g',	'Enchanteur 425g'	,'Body Treatment and Cream',	'unit', 0, 0, 0, 'Faaajs Admin',	'3',	'3',	'Enchanteur-425g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('vaseline blue seal 250ml',	'vaseline blue seal 250ml'	,'Body Treatment and Cream',	'unit',	800,	600,	200,	'Faaajs Admin',	'2',	'2',		'vaseline-blue-seal-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('skin lighting cream 170g', 	'skin lighting cream 170g' 	,'Body Treatment and Cream',	'unit',	900,	700,	200,	'Faaajs Admin',	'37',	'37',	'skin-lighting-cream-170g' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0');

-- done 2



('nivea Cream 250g', 	'nivea Cream 250g' 	,'Body Spray and Perfume',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',	'nivea-Cream-250g' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('lifebuoy lemon fresh 110g',	'lifebuoy lemon fresh 110g',	'Detergent',	'unit',	200,	150,	50,	'Faaajs Admin',	'11','11',	'lifebuoy-lemon-fresh-110g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('pears baby lotion 200ml', 	'pears baby lotion 200ml' ,'Baby Care', 	'unit',	500,	400,	100,	'Faaajs Admin',	'1',	'1',		'pears-baby-lotion-200ml' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('evoluderm 500l',	'evoluderm 500l','Baby Care', 	'unit',	1000, 800,	200,	'Faaajs Admin',	'1',	'1',	'evoluderm-500l', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('peals petroleum jelly 225g',	'peals petroleum jelly 225g','Baby Care','unit',	400,	350,	50,	'Faaajs Admin',	'8',	'8',	'peals-petroleum-jelly-225g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('bekat liquid detergent 250ml',	'bekat liquid detergent 250ml',	'Detergent',	'unit',	150,	100,	50,	'Faaajs Admin',	'1',	'1',	'bekat-liquid-detergent-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Adidas victory leaque',	'Adidas victory leaque'	,'Body Spray and Perfume',	'unit',	2000,	1500,	500,	'Faaajs Admin',	'7',	'7',	'Adidas-victory-leaque', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Adidas natural spray',	'Adidas natural spray'	,'Body Spray and Perfume',	'unit',	1000,	800,	200,'Faaajs Admin',	'9',	'9',	'Adidas-natural-spray', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('FASIO 100ml',	'FASIO 100ml'	,'Body Spray and Perfume',	'unit',	4500,	3500,	1000,	'Faaajs Admin',	'1',	'1',	'FASIO-100ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Dettol Liquid 15ml',	'Dettol Liquid 15ml'	,'Body Treatment and Cream',	'unit',	50,	35,	15,	'Faaajs Admin',	'12',	'12',	'Dettol-Liquid-15ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('sunlight 750ml',	'sunlight 750ml',	'Laundry',	'unit',	550,	450,	100,	'Faaajs Admin',	'7',	'7',	'sunlight-750ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),


('car wash 1litre',	'car wash 1litre'	,'Laundry',	'unit',	900,	800,	100,	'Faaajs Admin',	'1',	'1',	'car-wash-1litre', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),


('JIK 475ml',	'JIK 475ml'	,'Laundry',	'unit',	500,	350,	150,	'Faaajs Admin',	'2',	'2',		'JIK-475ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),


('VIN 500l',	'VIN 500l',	'Laundry',	'unit',	400,	350,	50,	'Faaajs Admin',	'2',	'2',	'VIN-500l', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('VIM 600l',	'VIM 600l',	'Laundry',	'unit',	500,	350,	150,	'Faaajs Admin',	'2',	'2',	'VIM-600l', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('inspire body wash',	'inspire body wash',	'Laundry',	'unit',	1500,	1200,	300,	'Faaajs Admin',	'1',	'1',	'inspire-body-wash', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

-- done 3



('tracia shower cream',	'tracia shower cream'	,'Laundry',	'unit',	1800,	1500,	300,	'Faaajs Admin',	'1',	'1',		'tracia-shower-cream', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Iman shower cream',	'Iman shower cream',	'Laundry',	'unit',	1700,	1500,	200,	'Faaajs Admin',	'1',	'1',		'Iman-shower-cream', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('daily defense 532ml',	'daily defense 532ml',	'Laundry',	'unit',	1000,	800,	200,	'Faaajs Admin',	'1',	'1',		'daily-defense-532ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('KLAR and DANVER5 591ml',	'KLAR and DANVER5 591ml',	'Laundry',	'unit',	1000,	800,	200,	'Faaajs Admin',	'1',	'1',		'KLAR-and-DANVER5-591ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('carrot glow 1000lm',	'carrot glow 1000lm',	'Laundry',	'unit',	1800,	1500,	300,	'Faaajs Admin',	'1',	'1','carrot-glow-1000lm', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('VBIL carambola', 	'VBIL carambola', 	'Laundry',	'unit',	1500,	1200,	300	,'Faaajs Admin',	'1',	'1',		'VBIL-carambola' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('extreme glow',	'extreme glow',	'Laundry',	'unit',	2000,	1800,	200,	'Faaajs Admin',	'1',	'1',		'extreme-glow', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('OLAY body wash',	'OLAY body wash',	'Laundry',	'unit',	1000,	800,	200,	'Faaajs Admin',	'1',	'1'	,	'OLAY-body-wash', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Tropical scemted',	'Tropical scemted',	'Laundry',	'unit',	800,	600,	200,	'Faaajs Admin',	'1',	'1',		'Tropical-scemted', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('perfect purity deodorant 283g',	'perfect purity deodorant 283g'	,'Laundry',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',	'perfect-purity-deodorant-283g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('cussons baby wipes', 	'cussons baby wipes' 	,'Baby Care', 	'unit',	400,	300,	100,	'Faaajs Admin',	'3',	'3',		'cussons-baby-wipes' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Always ultra thin',	'Always ultra thin'	,'Baby Care', 	'unit',	450,	350,	100,	'Faaajs Admin',	'6',	'6',		'Always-ultra-thin', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('lady care wings',	'lady care wings',	'Make Up',	'unit',	350,	280,	70,	'Faaajs Admin',	'8',	'8',		'lady-care-wings', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('zanonni baby diapers 5-10kgs',	'zanonni baby diapers 5-10kgs'	,'Baby Care', 	'unit',	2200,	2000,	200,	'Faaajs Admin',	'3',	'3',		'zanonni-baby-diapers-5-10kgs', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('molfix baby paints (56pieces) 7-18kgs','molfix baby paints (56pieces) 7-18kgs', 'Baby Care', 	'unit',	4000,	3800,	200,	'Faaajs Admin',	'2',	'2',	'molfix-baby-paints-(56pieces)-7-18kgs', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('molfix GiGa economy (80pieces) 7-18kgs',	'molfix GiGa economy (80pieces) 7-18kgs', 'Baby Care', 	'unit',	4200,	4000,	200,	'Faaajs Admin',	'1',	'1',		'molfix-GiGa-economy-(80pieces)-7-18kgs', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('molfix baby paints (8pieces) 7-18kgs',	'molfix baby paints (8pieces) 7-18kgs', 'Baby Care','unit',	600,	550,	50,	'Faaajs Admin',	'17',	'17',		'molfix-baby-paints-(8pieces)-7-18kgs', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('swiss flower 250ml',	'swiss flower 250ml',	'Make Up',	'unit',	500,	350,	150,	'Faaajs Admin',	'8',	'8',		'swiss-flower-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('swiss flower 500ml',	'swiss flower 500ml',	'Make Up',	'unit',	1000,	800,	200,	'Faaajs Admin',	'8',	'8',		'swiss-flower-500ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('glade solid 170g',	'glade solid 170g'	,'Body Spray and Perfume',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',		'glade-solid-170g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('malizia uomo 150g',	'malizia uomo 150g'	,'Body Spray and Perfume',	'unit',	900,	692,	208,	'Faaajs Admin',	'9',	'9',		'malizia-uomo-150g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('adidas anti perspirant 53gml',	'adidas anti perspirant 53gml'	,'Body Spray and Perfume',	'unit',	600,	500,	100,	'Faaajs Admin',	'78',	'78',		'adidas-anti-perspirant-53gml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('enchanteur perfumed deo rollon  50ml',	'enchanteur perfumed deo rollon  50ml'	,'Body Spray and Perfume',	'unit',	550,	500,	50,	'Faaajs Admin',	'6',	'6',		'enchanteur-perfumed-deo-rollon-50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('fa floral protect 50ml',	'fa floral protect 50ml',	'Roll On',	'unit',	550,	500,	50,	'Faaajs Admin',	'82',	'82',		'fa-floral-protect-50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('body mist ocean berry 50ml',	'body mist ocean berry 50ml'	,'Body Spray and Perfume',	'unit',	200,	150,	50,	'Faaajs Admin',	'1',	'1',		'body-mist-ocean-berry-50ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('B powder brush',	'B powder brush',	'Make Up',	'unit',	1500,	1200,	300,	'Faaajs Admin',	'1',	'1',		'B-powder-brush', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nail polish Paint',	'nail polish Paint',	'Make Up',	'unit',	100,	70,	30,	'Faaajs Admin',	'4',	'4',		'nail-polish-Paint', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('eyes shine shine S/S',	'eyes shine shine S/S',	'Make Up',	'unit',	500,	350,	150,	'Faaajs Admin',	'11',	'11',		'eyes-shine-shine-S/S', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('eyes shine shine B/S',	'eyes shine shine B/S',	'Make Up',	'unit',	700,	500,	200,	'Faaajs Admin',	'3',	'3',		'eyes-shine-shine-B/S', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('royal crown shaving powder 142g',	'royal crown shaving powder 142g',	'Make Up',	'unit',	1350,	1250,	100,	'Faaajs Admin',	'12',	'12',		'royal-crown-shaving-powder-142g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('sanex men 150ml',	'sanex men 150ml',	'Make Up',	'unit',	1000, 800,	200,	'Faaajs Admin',	'1',	'1',	'sanex-men-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('perfect line 100ml',	'perfect line 100ml',	'Make Up',	'unit',	350,	250,	100,	'Faaajs Admin',	'1',	'1',		'perfect-line-100ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('eye pencil',	'eye pencil',	'Make Up',	'unit',	100,	70,	30,	'Faaajs Admin',	'10',	'10',	'eye-pencil', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('eye brush Foundation',	'eye brush Foundation',	'Make Up',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'1',	'1',		'eye-brush-Foundation', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('milan',	'milan',	'Make Up',	'unit',	1200,	1000,	200,	'Faaajs Admin',	'2',	'2',		'milan', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('classic makeup 30ml',	'classic makeup 30ml',	'Make Up',	'unit',	1800,	1500,	300,	'Faaajs Admin',	'1',	'1',		'classic-makeup-30ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Air Wick Drumme Gel 45g',	'Air Wick Drumme Gel 45g'	,'Body Spray and Perfume',	'unit',	250,	180,	70,	'Faaajs Admin',	'41',	'41',	'Air-Wick-Drumme-Gel-45g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('KDO soap 300ml',	'KDO soap 300ml'	,'Detergent',	'unit',	300,	200,	100,	'Faaajs Admin',	'19',	'19',		'KDO-soap-300ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('so easy soap 150g',	'so easy soap 150g'	,'Detergent',	'unit',	100,	70,	30,	'Faaajs Admin',	'41',	'41',		'so-easy-soap-150g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('family care total protect 200g',	'family care total protect 200g'	,'Detergent',	'unit',	300,	250,	50,	'Faaajs Admin',	'1',	'1',		'family-care-total-protect-200g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('salvation Laundry soap 300g',	'salvation Laundry soap 300g','Detergent',	'unit',	250,	150,	100,	'Faaajs Admin',	'54',	'54',		'salvation-Laundry-soap-300g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('sunlight 2in1 value pack 2kg',	'sunlight 2in1 value pack 2kg'	,'Detergent',	'unit',	1500,	1300,	200,	'Faaajs Admin',	'3',	'3',		'sunlight-2in1-value-pack-2kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('so klin 500g',	'so klin 500g'	,'Detergent',	'unit',	500,	350,	150,	'Faaajs Admin',	'10',	'10',		'so-klin-500g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('so klin matic 1kg',	'so klin matic 1kg'	,'Detergent',	'unit', 0, 0, 0, 'Faaajs Admin',	'6',	'6',		'so-klin-matic-1kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('so klin 900g',	'so klin 900g'	,'Detergent',	'unit',	800,	584,	216,	'Faaajs Admin',	'1',	'1',		'so-klin-900g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('sunlight 2in1 900g',	'sunlight 2in1 900g'	,'Detergent',	'unit',	600,	500,	100,	'Faaajs Admin',	'7',	'7',		'sunlight-2in1-900g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('good mama detergent 1kg',	'good mama detergent 1kg'	,'Detergent',	'unit',	650,	513,	137,	'Faaajs Admin',	'2',	'2',		'good-mama-detergent-1kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Omo hand washing powder 900g',	'Omo hand washing powder 900g',	'Detergent',	'unit',	750,	600,	150,	'Faaajs Admin',	'5',	'5',	'Omo-hand-washing-powder-900g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('WAW detergent 90g',	'WAW detergent 90g',	'Detergent',	'unit',	50,	47,	3,	'Faaajs Admin',	'44',	'44',		'WAW-detergent-90g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('So klin protect 75g',	'So klin protect 75g',	'Detergent',	'unit',	50,	41,	9,	'Faaajs Admin',	'48',	'48',		'So-klin-protect-75g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('So klin protect 185g',	'So klin protect 185g',	'Detergent',	'unit',	150,	85,	65,	'Faaajs Admin',	'26',	'26',		'So-klin-protect-185g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('So klin 65g',	'So klin 65g',	'Detergent',	'unit',	60,	42,	18,	'Faaajs Admin',	'50',	'50',	'So-klin-65g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('sunlight 2in1 200g',	'sunlight 2in1 200g',	'Detergent',	'unit',	100,	86,	14,	'Faaajs Admin',	'8',	'8',		'sunlight-2in1-200g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('So klin 60g',	'So klin 60g',	'Detergent',	'unit',	50,	42,	8,	'Faaajs Admin',	'45',	'45',	'So-klin-60g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('So klin 28g',	'So klin 28g',	'Detergent',	'unit',	25,	18,	7,	'Faaajs Admin',	'18',	'18',		'So-klin-28g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('So klin 160g',	'So klin 160g',	'Detergent',	'unit',	150,	135,	15,	'Faaajs Admin',	'1',	'1',	'So-klin-160g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Dettol liquid 750ml',	'Dettol liquid 750ml',	'Detergent',	'unit',	3000,	2559,	441,	'Faaajs Admin',	'8',	'8',		'Dettol-liquid-750ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Dettol liquid 500ml',	'Dettol liquid 500ml',	'Detergent',	'unit',	2000,	1800,	200,	'Faaajs Admin',	'1',	'1',		'Dettol-liquid-500ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Dettol liquid 250ml',	'Dettol liquid 250ml',	'Detergent',	'unit',	1000,	813,	187,	'Faaajs Admin',	'18',	'18',		'Dettol-liquid-250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Dettol liquid 165ml',	'Dettol liquid 165ml',	'Detergent',	'unit',	750,	530,	220,	'Faaajs Admin',	'11',	'11',	'Dettol-liquid-165ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Dettol liquid 75ml',	'Dettol liquid 75ml',	'Detergent',	'unit',	350,	265,	85,	'Faaajs Admin',	'22',	'22',		'Dettol-liquid-75ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Purit liquid anti 125ml',	'Purit liquid anti 125ml','Detergent',	'unit',	700,	500,	200,	'Faaajs Admin',	'4',	'4',		'Purit-liquid-anti-125ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Jik stain removal',	'Jik stain removal',	'Detergent',	'unit',	50,	35,	15,	'Faaajs Admin',	'15',	'15',	'Jik-stain-removal', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('milkits milk lollipop 375g',	'milkits milk lollipop 375g'	,'Sweet',	'unit',	450,	410,	40,	'Faaajs Admin',	'8',	'8',		'milkits-milk-lollipop-375g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Ak food pako biscuit', 	 'Ak food pako biscuit' ,	'Biscuits',	'unit',	50,	39,	11,	'Faaajs Admin',	'48',	'48',		 'Ak-food-pako-biscuit' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('ok pop freshyo 190g',	'ok pop freshyo 190g',	'Drinks',	'unit',	200,	191,	9,	'Faaajs Admin',	'16',	'16',		'ok-pop-freshyo-190g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('butter mint',	'butter mint'	,'Sweet',	'unit',	250,	200,	50,	'Faaajs Admin',	'16',	'1-',		'butter-mint', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('sword lemon x',	'sword lemon x'	,'Sweet',	'unit',	150,	125,	25,	'Faaajs Admin',	'9',	'9',		'sword-lemon-x', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Tom Tom',	'Tom Tom'	,'Sweet',	'unit',	300,	250,	50,	'Faaajs Admin',	'6',	'6',		'Tom-Tom', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Xylitol S/S',	'Xylitol S/S'	,'Sweet',	'unit',	350,	229,	121,	'Faaajs Admin',	'48',	'48',		'Xylitol S/S', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('orbit 27g',	'orbit 27g'	,'Sweet',	'unit',	350,	309,	41,	'Faaajs Admin',	'35',	'35',		'orbit-27g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('clorets B/S',	'clorets B/S','Sweet',	'unit',	100,	80,	20,	'Faaajs Admin',	'51',	'51',		'clorets-B/S', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Xylitol B/S',	'Xylitol B/S'	,'Sweet',	'unit',	600,	500,	100,	'Faaajs Admin',	'5',	'5','Xylitol-B/S', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Great heart',	'Great heart'	,'Sweet',	'unit',	20,	15,	5,	'Faaajs Admin',	'54',	'54',		'Great-heart', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('cloret Small',	'cloret Small'	,'Sweet',	'unit',	20,	15,	5,	'Faaajs Admin',	'65',	'65',		'cloret-Small', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('rose plus S/S',	'rose plus S/S'	,'Sweet',	'unit',	80,	62,	18,	'Faaajs Admin',	'84',	'84',		'rose-plus S/S', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('Rose Tissue software', 	'Rose Tissue software' ,	'Provision',	'unit',	70,	57,	13,	'Faaajs Admin',	'40',	'40',		'Rose-Tissue-software' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('rose plus B/S',	'rose plus B/S',	'Provision',	'unit',	400,	275,	125,	'Faaajs Admin',	'11',	'11',		'rose-plus-B/S', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('dilly tissue',	'dilly tissue'	,'Baby Care', 	'unit',	250,	200,	50,	'Faaajs Admin',	'11',	'11',		'dilly-tissue', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Car Tissue Rose Belle',	'Car Tissue Rose Belle'	,'Baby Care', 	'unit',	350,	271,	79,	'Faaajs Admin',	'28',	'28',		'Car-Tissue-Rose-Belle', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('rose carla towels',	'rose carla towels'	,'Cloth',	'unit',	650,	500,	150,	'Faaajs Admin',	'8',	'8',		'rose-carla-towels', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('supreme tasty chicken',	'supreme tasty chicken',	'Noodles',	'unit',	450,	400,	50,	'Faaajs Admin',	'3',	'3',		'supreme-tasty-chicken', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('indomie noodles 120g Super Pack',	'indomie noodles 120g Super Pack',	'Noodles',	'unit',	100,	80,	20,	'Faaajs Admin',	'18',	'18','indomie-noodles-120g-Super-Pack', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('indomie instant noodles 70g',	'indomie instant noodles 70g',	'Noodles',	'unit',	60,	50,	10,	'Faaajs Admin',	'154',	'154',		'indomie-instant-noodles-70g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('indomie onion chicken 70g',	'indomie onion chicken 70g',	'Noodles',	'unit',	70,	55,	15,	'Faaajs Admin',	'13',	'13',		'indomie-onion-chicken-70g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('indomie oriental fried noodles 100g',	'indomie oriental fried noodles 100g',	'Noodles',	'unit',	100,	80,	20,	'Faaajs Admin',	'4',	'4','indomie-oriental-fried-noodles-100g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('lucozade boost 16by125ml',	'lucozade boost 16by125ml',	'Noodles',	'unit',	1050,	1000,	50,	'Faaajs Admin',	'3',	'3',		'lucozade-boost-16by125ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('lucozade boost 12by250ml',	'lucozade boost 12by250ml',	'Noodles',	'unit',	170,	145,	25,	'Faaajs Admin',	'24',	'24',		'lucozade-boost-12by250ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('happy hour 150ml',	'happy hour 150ml',	'Noodles',	'unit',	1200,	1100,	100,	'Faaajs Admin',	'2',	'2',		'happy-hour-150ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('chi exotic 15ml Bulk',	'chi exotic 15ml Bulk',	'Noodles',	'Bulk',	4000,	3500,	500,	'Faaajs Admin',	'5',	'5',	'chi-exotic-15ml-Bulk', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('ribenna 125ml Bulk',	'ribenna 125ml Bulk',	'Noodles',	'Bulk',	1050,	1000,	50,	'Faaajs Admin',	'2',	'2',		'ribenna-125ml-Bulk', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('hollandia Milk Cap 190g',	'hollandia Milk Cap 190g',	'Noodles',	'unit',	200,	188,	12,	'Faaajs Admin',	'28',	'28',	'hollandia-Milk-Cap-190g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('faaajs Aneefat chin chin',	'faaajs Aneefat chin chin',	'Faaajs',	'unit',	250,	200,	50,	'Faaajs Admin',	'54',	'54',		'faaajs-Aneefat-chin-chin', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('pure bliss 75g',	'pure bliss 75g',	'Biscuits',	'unit',	100,	75,	25,	'Faaajs Admin',	'102',	'102',		'pure-bliss-75g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('pure bliss 33g',	'pure bliss 33g',	'Biscuits',	'unit',	50,	45,	5,	'Faaajs Admin',	'12',	'12',		'pure-bliss-33g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('pure bliss milk cream wafers 45g',	'pure bliss milk cream wafers 45g',	'Biscuits',	'unit',	100,	85,	15,	'Faaajs Admin',	'49',	'49',	'pure-bliss-milk-cream-wafers-45g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('rich tea 300g',	'rich tea 300g',	'Tea',	'unit',	500,	400,	100,	'Faaajs Admin',	'8', '8','rich-tea-300g', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('coco romeo',	'coco romeo',	'Tea',	'unit',	200,	150,	50,	'Faaajs Admin',	'12',	'12',	'coco-romeo', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Lino Chocolate',	'Lino Chocolate',	'Tea',	'unit',	200,	150,	50,	'Faaajs Admin',	'23',	'23',  'Lino-Chocolate', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('chocolate m and m',	'chocolate m and m',	'Tea',	'unit',	350,	300,	50,	'Faaajs Admin',	'12',	'12',		'chocolate-m-and-m', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('mega chocolate',	'mega chocolate',	'tea',	'unit',	250,	200,	50,	'Faaajs Admin',	'27',	'27',		'mega-chocolate', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nestle kitkat',	'nestle kitkat'	,'Sweet',	'unit',	250,	200,	50,	'Faaajs Admin',	'14',	'14',		'nestle-kitkat', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Amasi chocolate', 	'Amasi chocolate' 	,'Sweet',	'unit',	250,	200,	50,	'Faaajs Admin',	'25',	'25',		'Amasi-chocolate' , '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('manga sticks',	'manga sticks'	,'Sweet',	'unit',	100,	80,	20,	'Faaajs Admin',	'48',	'48',		'manga-sticks', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('vigos','vigos','Sweet',	'unit',	2000,	1800,	200,	'Faaajs Admin',	'1',	'1',		'vigos', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Owoyemi bread big',	'Owoyemi bread big',	'Food',	'unit',	500,	450,	50,	'Faaajs Admin',	'2',	'2','Owoyemi-bread-big', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Owoyemi bread medium',	'Owoyemi bread medium',	'Food',	'unit',	300,	250,	50,	'Faaajs Admin',	'2',	'2',		'Owoyemi-bread-medium', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('owoyemi bread slice small',	'owoyemi bread slice small',	'Food',	'unit',	150,	120,	30,	'Faaajs Admin', '0', '0', 'owoyemi-bread-slice-small', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('plaintain chips',	'plaintain chips',	'Food',	'unit',	50,	45,	5,	'Faaajs Admin',	'3',	'3',		'plaintain-chips', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('chi exotic 1ltr',	'chi exotic 1ltr',	'Drinks',	'unit',	500,	350,	150,	'Faaajs Admin',	'3',	'3',	'chi-exotic-1ltr', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('chivita ice tea 1ltr',	'chivita ice tea 1ltr',	'Drinks',	'unit',	500,	300,	200,	'Faaajs Admin',	'1',	'1',		'chivita-ice-tea-1ltr', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('cream crackers Kampe',	'cream crackers Kampe',	'Biscuits',	'unit',	25,	20,	5,	'Faaajs Admin',	'100',	'100',		'cream-crackers-Kampe', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('parle G Gold biscuits',	'parle G Gold biscuits',	'Biscuits',	'unit',	50,	45,	5,	'Faaajs Admin',	'10',	'10',		'parle-G-Gold-biscuits', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('parle G biscuits',	'parle G biscuits',	'Biscuits',	'unit',	50,	45,	5,	'Faaajs Admin',	'3',	'3',		'parle-G-biscuits', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('oxford meal time biscuits',	'oxford meal time biscuits', 'Biscuits',	'unit',	50,	45,	5,	'Faaajs Admin',	'1',	'1',		'oxford-meal-time-biscuits', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Taamot chin chin 60gm',	'Taamot chin chin 60gm',	'Biscuits',	'unit',	50,	43,	7,	'Faaajs Admin',	'40',	'40',		'Taamot-chin-chin-60gm', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('crunchy and yummy 50g Pop Corn',	'crunchy and yummy 50g Pop Corn',	'Provision',	'unit',	50,	45,	5,	'Faaajs Admin',	'67',	'67',	'crunchy-and-yummy-50g-Pop-Corn', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('crunchy and yummy 100g Pop Corn',	'crunchy and yummy 100g Pop Corn',	'Provision',	'unit',	100, 80,	20,	'Faaajs Admin',	'60',	'60','crunchy-and-yummy-100g-Pop-Corn', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('parle malty biscuits',	'parle malty biscuits',	'Biscuits',	'unit',	50,	45,	5,	'Faaajs Admin',	'10',	'10',	'parle-malty-biscuits', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('golden penny semovita 1kg',	'golden penny semovita 1kg',	'Provision',	'unit',	450,	380,	70,	'Faaajs Admin',	'25',	'25',	'golden-penny-semovita-1kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('golden penny semovita 2kg',	'golden penny semovita 2kg',	'Provision',	'unit',	800,	700,	100,	'Faaajs Admin',	'5',	'5',		'golden-penny-semovita-2kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('honeywell semolina 1kg',	'honeywell semolina 1kg',	'Provision',	'unit',	450,	380,	70,	'Faaajs Admin',	'10',	'10',		'honeywell-semolina-1kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('honeywell semolina 2kg',	'honeywell semolina 2kg','Provision',	'unit',	800,	700,	100,	'Faaajs Admin',	'5',	'5',	'honeywell-semolina-2kg', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('fresh yo drinking yoghurt 400ml',	'fresh yo drinking yoghurt 400ml',	'Yoghurt',	'unit',	250,	195,	55,	'Faaajs Admin',	'18',	'18',	'fresh-yo-drinking-yoghurt-400ml', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('star radler',	'star radler',	'Drinks',	'unit',	200,	150,	50,	'Faaajs Admin',	'90',	'90',		'star-radler', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('bonita spaghetti',	'bonita spaghetti',	'Provision',	'unit',	250,	200,	50,	'Faaajs Admin',	'10',	'10',		'bonita-spaghetti', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),

('success peanut',	'success peanut'	,'Sweet',	'unit',	50,	45,	5,	'Faaajs Admin',	'35',	'35',		'success-peanut', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('nestle milo active go',	'nestle milo active go',	'Provision',	'unit',	100,	86,	14,	'Faaajs Admin',	'112',	'112',		'nestle-milo-active-go', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('maltina classic',	'maltina classic',	'Drinks',	'unit',	350,	280,	70,	'Faaajs Admin',	'25',	'25',		'maltina-classic', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('royal sweet chocolate',	'royal sweet chocolate'	,'Sweet',	'unit',	3000,	2600,	400,	'Faaajs Admin',	'1',	'1',		'royal-sweet-chocolate', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('bra XXL',	'bra XXL'	,'Cloth',	'unit',	800,	600,	200,	'Faaajs Admin',	'4',	'4',		'bra-XXL', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('skirt black',	'skirt black'	,'Cloth',	'unit',	800,	600,	200,	'Faaajs Admin',	'1',	'1',		'skirt-black', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('FAAAJS AA1',	'FAAAJS AA1'	,'Cloth',	'unit',	2000,	1500,	500,	'Faaajs Admin',	'3',	'3',		'FAAAJS-AA1', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('bra XL',	'bra XL'	,'Cloth',	'unit',	800,	600,	200,	'Faaajs Admin',	'4',	'4',	'bra-XL', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Hufu Up and Down',	'Hufu Up and Down'	,'Cloth',	'unit',	700,	600,	100,	'Faaajs Admin',	'1',	'1',		'Hufu-Up-and-Down', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('socks',	'socks'	,'Cloth',	'unit',	500,	350,	150,	'Faaajs Admin',	'6',	'6',	'socks', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Kids Pant',	'Kids Pant'	,'Cloth',	'unit',	200,	150,	50,	'Faaajs Admin',	'7',	'7',		'Kids-Pant', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('FAAAJS 03',	'FAAAJS 03'	,'Cloth',	'unit',	800,	700,	100,	'Faaajs Admin',	'1',	'1',		'FAAAJS-03', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('xpression chrochet',	'xpression-chrochet'	,'Cloth',	'unit',	750,	700,	50,	'Faaajs Admin',	'7',	'7',	'xpression-chrochet', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0'),
('Kid Shirt and Trouser',	'Kid Shirt and Trouser'	,'Cloth',	'unit',	7500,	6000,	1500, 'Faaajs Admin',	'1',	'1',		'Kid-Shirt-and-Trouser', '2020-06-29 07:20:29',  '2020-06-29 07:20:29', '0');


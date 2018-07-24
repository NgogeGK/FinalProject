FORMAT: 1A
HOST: http://api.jkusdachurch.org/

# JKUSDA

JKUSDA is a simple API allowing JKUSDA developers to build systems for the church.



#Group Preliminary

## Get key [/auth]

This call logs in an api user into the system and provides them with their current api key.
+ Parameters
    + email (required, string, `'betaclifford@gmail.com'`) ... String `name` of the api user .
    + password (required, string, `'12345'`) ... String `password` of the user.
    

### Reference [POST]
+ Request (application/json)

        {"email":"betaclifford@gmail.com","password":"12345"}

+ Response 200 (application/json)

{"status":"success","message":{"user_name":"Clifford Beta","user_email":"betaclifford@gmail.com","user_phone":"0706677565","user_id":"1","api_key":"KA83T9iQm4oK0Jjcnid4X7AQOvxFmwl5","user_type":"Nondescript"}}


#Group Student

##Add Student [/student]

This call creates the record of a new student in the database.
+ Parameters
    + api-key (required, string, `'123456'`) 
    + name (required, string, `'Clifford Beta'`) ... String `name` of the user being created.
    + phone (required, string, `'0706677565'`) ... String `phone` of the user being created.
    + email (required, string, `'cbeta@adhrc.co.ke'`) ... String `name` of the user being created.
    + gender (required, string, `'M'`) ... String `gender` of the user being created, M/F.
    

### Reference [POST]
+ Request (application/json)

        {"api-key":"123456","name":"Clifford Beta","email":"b.clifford@sendy.co.ke","phone":"0706677565","gender":"M"}

+ Response 200 (application/json)

{"user_name":"Floyd Kotohoyo","user_email":"floydkots@gmail.com","user_phone":"0704684969","user_id":"3","api_key":"zDKdnjnrYWi8xSXI4frLa7bFzVK61Xdc","user_type":"Dev"}




#Group Student

##Add Student [/student]

This call creates the record of a new student in the database.
+ Parameters
    + api-key (required, string, `'123456'`) 
    + name (required, string, `'Clifford Beta'`) ... String `name` of the user being created.
    + phone (required, string, `'0706677565'`) ... String `phone` of the user being created.
    + email (required, string, `'cbeta@adhrc.co.ke'`) ... String `name` of the user being created.
    + gender (required, string, `'M'`) ... String `gender` of the user being created, M/F.
    

### Reference [POST]
+ Request (application/json)

        {"api-key":"123456","name":"Clifford Beta","email":"b.clifford@sendy.co.ke","phone":"0706677565","gender":"M"}

+ Response 200 (application/json)

{"status":"Success","message":"Member inserted successfully"} 

## Retrieve students [/all_members]

This call retrieves all student details.
+ Parameters
 
    + api-key (required, string, `'123456'`) ... String `api key`.
   

### Reference [POST]
+ Request (application/json)

        {"api-key":"123456"}

+ Response 200 (application/json)
{"status":"Success","message":[{"id":"1","jina":"SARAH  KERUBO  MOSETI","pepea":"skmoseti15@gmail.com","member_type":"1"},{"id":"2","jina":"NYONGESA HARRISON PAYAS","pepea":"harrisonjez@gmail.com","member_type":"1"},{"id":"3","jina":"OMWANSA STEVE MICHIRA","pepea":"stevemwansa@gmail.com","member_type":"1"},{"id":"4","jina":"ERIC  THOMAS  OCHANDA NTABO","pepea":"ochandaeric@gmail.com","member_type":"1"},{"id":"5","jina":"DANIEL   AYUEN  JOK","pepea":"Ayuenjok@gmail.com","member_type":"1"},{"id":"6","jina":"EDWIN   OMBORI  ONG'ERA","pepea":"edwinoedwin2015@outlook.com","member_type":"1"},{"id":"7","jina":"CAROLINE  KEMUMA","pepea":"carolinekemuma@gmail.com","member_type":"1"},{"id":"8","jina":"Eastman Magembe","pepea":"eastmanmagembe@gmail.com","member_type":"1"},{"id":"9","jina":"ROBERT MALAKI","pepea":"malakirobert@gmail.com","member_type":"1"},{"id":"10","jina":"MOKUMI OKARI RODGERS","pepea":"okarirodgers@yahoo.com","member_type":"1"},{"id":"11","jina":"WAYNE  DWAYNE  DWALLOW","pepea":"dwyne12183@gmail.com","member_type":"1"},{"id":"12","jina":"GOR  DANIEL","pepea":"thedanielgor@yahoo.com","member_type":"1"},{"id":"13","jina":"COLLINS  ONSARIGO  MOKAYA","pepea":"cdeancams@gmail.com","member_type":"1"},{"id":"14","jina":"VIONA  VASHNADZE  .O.","pepea":"viona.vashnadze@gmail.com","member_type":"1"},{"id":"15","jina":"CHRISTABEL  M ISAGI","pepea":"christabelisagi@gmail.com","member_type":"1"},{"id":"16","jina":"WAMANYA  BRIAN  ODUOR","pepea":"brianmilulu@gmail.com","member_type":"1"},{"id":"17","jina":"PAUL KIPROTICH","pepea":"oyerae1994@gmail.com","member_type":"1"},{"id":"18","jina":"DICKSON OCHIENG\u2019","pepea":"ochiengdickson881@yahoo.com","member_type":"1"},{"id":"19","jina":"DUKE  N.  MOMANYI","pepea":"dukemomanyi4@gmail.com","member_type":"1"},{"id":"20","jina":"NTOINYA KENDI ANN","pepea":"annkendi@gmail.com","member_type":"1"},{"id":"21","jina":"LAWRENCE SAGINI","pepea":"sagini.lawrence@yahoo.com","member_type":"1"},{"id":"22","jina":"MOMANYI  WANZA ESTHER","pepea":"estherwanza@gmail.com","member_type":"1"},{"id":"23","jina":"MOKONO MERCY","pepea":"mercykemunto82@gmail.com","member_type":"1"},{"id":"24","jina":"ISOMBA BISERA DENNIS","pepea":"dennisbisera@gmail.com","member_type":"1"},{"id":"25","jina":"WAMALWA M. DAVID","pepea":"vllddavid42@gmail.com","member_type":"1"},{"id":"26","jina":"VINCENT ODHIAMBO  OKOTH","pepea":"orwavinceprez@gmail.com","member_type":"1"},{"id":"27","jina":"MICAH  MOGAKA  NYAKIENI","pepea":"micahnyakieni@gmail.com","member_type":"1"},{"id":"28","jina":"STEPHEN  KIPLIMO  ","pepea":"alegendrosteve1@gmail.com","member_type":"1"},{"id":"29","jina":"RICHARD    RABAO","pepea":"brrmurabao9@mail.com","member_type":"1"},{"id":"30","jina":"FAITH  CHEBET  KITUR","pepea":"faithkitur@gmail.com","member_type":"1"},{"id":"31","jina":"CAROLINE  KERUBO  ASUGA","pepea":"carolineasuga@gmail.com","member_type":"1"},{"id":"32","jina":"MANDILLAHM   SAMUEL","pepea":"samuelmandillah@gmail.com","member_type":"1"},{"id":"33","jina":"ONWONG'A  DEBORAH","pepea":"deborahkem.onwog'a@gmail.com","member_type":"1"},{"id":"34","jina":"IDA  NYAMONGO  KEMUNTO","pepea":"idanyamong@gmail.com","member_type":"1"},{"id":"35","jina":"Zephaniah Adar","pepea":"adarzeph@gmail.com","member_type":"1"},{"id":"36","jina":"CHERUIYOT REUBEN","pepea":"ruebencheruiyot541@gmail.com ","member_type":"1"},{"id":"37","jina":"ODHIAMBO  ISAYA  DAN","pepea":"ia=saiahodan@gmail.com","member_type":"1"},{"id":"38","jina":"ANNDEAR W. GICHUHI","pepea":"anndearbenson@yahoo.com","member_type":"1"},{"id":"39","jina":"ELVIN KEMUNTO","pepea":"elvinkemmy@gmail.com","member_type":"1"},{"id":"40","jina":"OKUMU  EUNICE  AWINO","pepea":"mcokwnay@gmail.com","member_type":"1"},{"id":"41","jina":"PAUL NYAKUNDI","pepea":"paulnyakundi93@gmail.com","member_type":"1"},{"id":"42","jina":"Rhone  Oduor","pepea":"opioduor@gmail.com","member_type":"1"},{"id":"43","jina":"GOR CLARIE ATIENO","pepea":"happyclarie@ymail.com","member_type":"1"},{"id":"44","jina":"DAVID   ODENY  KAYI","pepea":"davidkayi004@gmail.com","member_type":"1"},{"id":"45","jina":"MOMANYI  PHILEMON  ARAKA","pepea":"philiarmon@yahoo.com","member_type":"1"},{"id":"46","jina":"KELVINE  MASESE  SAKAWA","pepea":"kelvinsakawa@gmail.com","member_type":"1"},{"id":"47","jina":"SHARON  DORINE ANYANGO","pepea":"sharonoyieke@gmail.com","member_type":"1"},{"id":"48","jina":"OGARI  RACHEL  BOSIBORI","pepea":"rachelogari@gmail.com","member_type":"1"},{"id":"49","jina":"MAURICE KARUME ","pepea":"mauricekarume@yahoo.com","member_type":"1"},{"id":"50","jina":"Diana Moraa","pepea":"dianamoraa97@gmail.com","member_type":"1"},{"id":"51","jina":"WYCLIFF OMONDI  NDERE","pepea":"wycliffeomondi1993@gmail.com","member_type":"1"},{"id":"52","jina":"OGADA ANDREW F AGINA","pepea":"andrewogada@gmail.com","member_type":"1"},{"id":"53","jina":"KENNETH OMITI","pepea":"keneth.okoth@yahoo.com","member_type":"1"},{"id":"54","jina":"MAUTI MAKORI JOEL ","pepea":"mautimakorijoel@gmail.com","member_type":"1"},{"id":"55","jina":"CHRIS  HANI  KWENYA","pepea":"chrishanikwenya@gmail.com","member_type":"1"},{"id":"56","jina":"NYAKUNDI  MOKUA  VINCENT","pepea":"mukuavincent@gmail.com","member_type":"1"},{"id":"57","jina":"OMBURA  ALPHONCE  OWINO","pepea":"alicross6@gmail.com","member_type":"1"},{"id":"58","jina":"DIANA AGNES","pepea":"dianaagnes6@gmail.com","member_type":"1"},{"id":"59","jina":"VICTOR MASESE OMANYA","pepea":"victormaanya.01@gmail.com","member_type":"1"},{"id":"60","jina":"HILLARY    KIMAIGA","pepea":"hillarykimaiga@gmail.com","member_type":"1"},{"id":"61","jina":"RODNEY MAKORI","pepea":"rodneymarks32@gmail.com","member_type":"1"},{"id":"62","jina":"RICHARD MOMANYI OANDA","pepea":"richmom16@gmail.com","member_type":"1"},{"id":"63","jina":"MBOYA   BASIL  ODHIAMBO","pepea":"nditoodhiambo@gmail.com","member_type":"1"},{"id":"64","jina":"VINCENT  OKELO  WANGA","pepea":"vincentokelo@gmail.com","member_type":"1"},{"id":"65","jina":"DENIS KIPTOO","pepea":"kiptoodenis95@gmail.com","member_type":"1"},{"id":"66","jina":"ANTONY  MIRERI  ONGWENYI","pepea":"antonymireri@gmail.com","member_type":"1"},{"id":"67","jina":"EDWINA A. OWUOR","pepea":"Owuor_Edwina@yahoo.com","member_type":"1"},{"id":"68","jina":"IRENE   MORAA  OMBASO","pepea":"irenemoraa524@gmail.com","member_type":"1"},{"id":"69","jina":"CHEPKORIR  RUTH","pepea":"cheeriechirry5178@gmail.com","member_type":"1"},{"id":"70","jina":"Mike Omondi","pepea":"odenymikey@gmail.com","member_type":"1"},{"id":"71","jina":"EDWIN ONG'AYO","pepea":"edwin.onkendu@gmail.com","member_type":"1"},{"id":"72","jina":"OUMA COLLINCE ARUM","pepea":"collincearum@gmail.com","member_type":"1"},{"id":"73","jina":"OUKO  COLLINS  OGAYA","pepea":"collinsj8303@gmail.com","member_type":"1"},{"id":"74","jina":"RAYMOND  KORIR","pepea":"rkorir1613@gmail.com","member_type":"1"},{"id":"75","jina":"ANNETTE OKETCH","pepea":"anneteokech@gmail.com","member_type":"1"},{"id":"76","jina":"IRENE  OMBONGI","pepea":"irineombagi@gmail.com","member_type":"1"},{"id":"77","jina":"OMWANDO  KERUBO   JANET","pepea":"janetkerubo31@gmail.com","member_type":"1"},{"id":"78","jina":"OCHIENGI  KAREN  BARONGO","pepea":"barongokaren96@gmail.com","member_type":"1"},{"id":"79","jina":"sarah Ogutu","pepea":"ogutusarah@gmail.com","member_type":"1"},{"id":"80","jina":"Floyd K'otohoyoh","pepea":"floydkots@gmail.com","member_type":"1"},{"id":"81","jina":"RONOH ALFRED","pepea":"ronohalfred38@gmail.coml","member_type":"1"},{"id":"82","jina":"OTIENO MICKEY","pepea":"mickeyotieno@yahoo.com","member_type":"1"},{"id":"83","jina":"CALEB ONGIRI GICHABA","pepea":"gichabac@yahoo.com","member_type":"1"},{"id":"84","jina":"MOINDI  TURNER OMBUI","pepea":"turnermoindi@gmail.com","member_type":"1"},{"id":"85","jina":"PAUL  OCHIENG'  ANYORE","pepea":"anyarepaul@gmail.com","member_type":"1"},{"id":"86","jina":"LILIAN CHEPKIRUI","pepea":"lilianchepkirui@gmail.com","member_type":"1"},{"id":"87","jina":"BRENDA  VIOLA","pepea":"brendaviola9.bv@gmail.com","member_type":"1"},{"id":"88","jina":"KADE GRACE  JACKLINE","pepea":"gracejackline75@gmail.com","member_type":"1"},{"id":"89","jina":"EDNA AUMA AMOLLO","pepea":"amoloedy@gmail.com","member_type":"1"},{"id":"90","jina":"GEORGE ONKOBA MEKENYE","pepea":"geonkoba94@gmail.com","member_type":"1"},{"id":"91","jina":"SAM  OCHARO  MOMANYI","pepea":"ssammomanyi@gmail.com","member_type":"1"},{"id":"92","jina":"MONGARE   DERRICK  NDUBI","pepea":"derrick.jagernut10@gmail.com","member_type":"1"},{"id":"93","jina":"OMANGI  GIDEON  ORIOKI","pepea":"oriokigideon@gmail.com","member_type":"1"},{"id":"94","jina":"ELSIE CHEBET","pepea":"ejebelkaranja@yahoo.com","member_type":"1"},{"id":"95","jina":"WAMBUI  PRICILLA  NJOKI","pepea":"Rykety9@gmail.com","member_type":"1"},{"id":"96","jina":"OPIYO  ROY  OKINYI","pepea":"royopiyo5@gmail.com","member_type":"1"},{"id":"97","jina":"JOEL NYAGWAYA MORANGA","pepea":"morangajoel@yahoo.com","member_type":"1"},{"id":"98","jina":"JACKSON  KIBET  KOSGEY","pepea":"kosgeyijackson@yahoo.com","member_type":"1"},{"id":"99","jina":"EMMA AKINYI","pepea":"emmaowuorakinyi@gmail.com","member_type":"1"},{"id":"100","jina":"Daisyberyl Akoth","pepea":"Daisyberyl96@gmail.com","member_type":"1"},{"id":"101","jina":"MATORO GORDON","pepea":"gkamatoro@gmail.com","member_type":"1"},{"id":"102","jina":"RANE DANIEL KIPTICH","pepea":"dan2@yahoo.COM","member_type":"1"},{"id":"103","jina":"BRIAN O ONYANGO","pepea":"konyangobrian@gmail.com","member_type":"1"},{"id":"104","jina":"MOKAMBA  ELIJAH  BUNDI","pepea":"bundie@gmail.com","member_type":"1"},{"id":"105","jina":"NYAKAMBI  STEVE  OYARO","pepea":"steveoyaro1@gmail.com","member_type":"1"},{"id":"106","jina":"innocent masese","pepea":"innomasese@gmail.com","member_type":"1"},{"id":"107","jina":"CHEROTICH CARREN","pepea":"cherotich.carren@students.jkuat.ac.ke","member_type":"1"},{"id":"108","jina":"MARK  OTARI","pepea":"markotari@gmail.com","member_type":"1"},{"id":"109","jina":"DAVID NYAMWEYA","pepea":"davidondari12@gmail.com","member_type":"1"},{"id":"110","jina":"SAMUEL OSEBE MOTANYA","pepea":"samuelosebe@yahoo.com","member_type":"1"},{"id":"111","jina":"EDWIN OGWENO ODUOR","pepea":"eduville32@gmail.com","member_type":"1"},{"id":"112","jina":"OYANGE KERRY MARSHAL","pepea":"kerrymarshal.oyunge@gmail.com","member_type":"1"},{"id":"113","jina":"MAURICE  ODUOR  OWINO","pepea":"mouriceoduor@gmail.com","member_type":"1"},{"id":"114","jina":"WARREN  GWARO  ONYANCHA","pepea":"warrenza500@gmail.com","member_type":"1"},{"id":"115","jina":"ZIPPORAH ONDIMU N","pepea":"ondimuzipporah94@gmail.com","member_type":"1"},{"id":"116","jina":"CHEPLETING  ZENAH  KOECH","pepea":"COSMO5051@gmail.com","member_type":"1"},{"id":"117","jina":"CAROLYNE  KERUBO MARENDI","pepea":"carolkmarendi@gmail.com","member_type":"1"},{"id":"118","jina":"ABERY  EMILY  MOKEIRA","pepea":"oberim2015@gmail.com","member_type":"1"},{"id":"119","jina":"AUGUSTINE MUNIALO","pepea":"augustiemunalo@yahoo.com","member_type":"1"},{"id":"120","jina":"NAOMI  KATHURE MAUTA","pepea":"naomomauti@gmail.com","member_type":"1"},{"id":"121","jina":"VICTOR KIPCHIRCHIR","pepea":"k.victor10@yahoo.com","member_type":"1"},{"id":"122","jina":"MWANEO NICK LEVITE","pepea":"levitemugua@gmail.com","member_type":"1"},{"id":"123","jina":"GEOFFREY KIPNGETICH","pepea":"kipffreyos@gmail.com","member_type":"1"},{"id":"124","jina":"KEVIN ONDWARI NYAKUNDI","pepea":"ondwarikevin@gmail.com","member_type":"1"},{"id":"125","jina":"ORWA  WASHINGTONE","pepea":"washyorwa@gmail.com","member_type":"1"},{"id":"126","jina":"ODHIAMBO  ONYANGO  FREDRICK","pepea":"fredrickeodhiambo@gmail.com","member_type":"1"},{"id":"127","jina":"OCHIENG'  RABIN","pepea":"ochiengrabin1@gmail.com","member_type":"1"},{"id":"128","jina":"ANGELINE KEMUNTO ","pepea":"angelinekemunto@yahoo.com","member_type":"1"},{"id":"129","jina":"AUDREY SHAROLLA OMORO ","pepea":"audreysharolla@gmail.com","member_type":"1"},{"id":"130","jina":"MARTHA  KEMUMA  MUIRURI","pepea":"kemmycyn@yahoo.com","member_type":"1"},{"id":"131","jina":"ODHIAMBO DANIEL OMBOK","pepea":"daniel.ombok@yahoo.com","member_type":"1"},{"id":"132","jina":"OGOLLA  ENOCK  OTIENO","pepea":"ogollaenock@gmail.com","member_type":"1"},{"id":"133","jina":"MOKIAMI  SHEILLA","pepea":"sheillamokiami@gmail.com","member_type":"1"},{"id":"134","jina":"Bwana James","pepea":"bwanajames2@gmail.com","member_type":"1"},{"id":"135","jina":"OCEVAN OMARE","pepea":"ocevanomare@gmail.com","member_type":"1"},{"id":"136","jina":"TREVOR ORIGA ASETO","pepea":"trevor15origa@gmail.com","member_type":"1"},{"id":"137","jina":"ERIC ODHIAMBO","pepea":"aokoerick@yahoo.com","member_type":"1"},{"id":"138","jina":"EMMANUEL  SINGA  AMOLLO","pepea":"singaemmanuel@gmail.com","member_type":"1"},{"id":"139","jina":"FELIX  KIRUI","pepea":"cheruiyotfelix2@gmail.com","member_type":"1"},{"id":"140","jina":"JOB  GISORE  MOSE","pepea":"jobgisore55@gmail.com","member_type":"1"},{"id":"141","jina":"QUEENTER CHEPKORIR","pepea":"cqueenter@yahoo.com","member_type":"1"},{"id":"142","jina":"Stephen Otieno","pepea":"stephenotieno57@gmail.com","member_type":"1"},{"id":"143","jina":"SILAS KEMBOI","pepea":"silaskemboi01@yahoo.com","member_type":"1"},{"id":"144","jina":"BONFACE T. BUNDI","pepea":"bonface.bundi@yahoo.com","member_type":"1"},{"id":"145","jina":"HUMPHREY  OTIENO  JUMA","pepea":"humphreyotieno16@gmail.com","member_type":"1"},{"id":"146","jina":"JOE  KIUNGA  MIRINGU","pepea":"joeqnga@gmail.com","member_type":"1"},{"id":"147","jina":"RONNY  KIPKOSGEI","pepea":"ronnychirchir@gmail.com","member_type":"1"},{"id":"148","jina":"TIMOTHY  TORO  0SANO","pepea":"Timothy-osano@yahoo.com","member_type":"1"},{"id":"149","jina":"OMAO KERUBO MERCY","pepea":"mercyomao@gmail.com","member_type":"1"},{"id":"150","jina":"EMMA MOKUA","pepea":"emmamokua@gmail.com","member_type":"1"},{"id":"151","jina":"JOB OMENTA","pepea":"omentajob@yahoo.com","member_type":"1"},{"id":"152","jina":"KEMUMA MOURINE  MWEBI","pepea":"kemumamourine@gmail.com","member_type":"1"},{"id":"153","jina":"Ayub  Benson","pepea":"benson.ayub@yahoo.com","member_type":"1"},{"id":"154","jina":"ODHACHA  MARK  OTIENO","pepea":"kodhachamark@yahoo.com","member_type":"1"},{"id":"155","jina":"Geoffrey Omeke","pepea":"Omekemogs@gmail.com","member_type":"1"},{"id":"156","jina":"MEKENYE  DAVID NDEBU","pepea":"davendebu96@gmail.com","member_type":"1"},{"id":"157","jina":"KETTY  ALDY  ODERO","pepea":"aldyketty@gmail.com","member_type":"1"},{"id":"158","jina":"NYAUNDI  PURITY  KEMUNTO","pepea":"prikentah@gmail.com","member_type":"1"},{"id":"159","jina":"RONO LAWRENCE","pepea":"rono_lawrence@yahoo.com","member_type":"1"},{"id":"160","jina":"REGAN OMONDI","pepea":"reaganomondi2@gmail.com","member_type":"1"},{"id":"161","jina":"KADE ABB CAROL","pepea":"kadecarol@yahoo.com","member_type":"1"},{"id":"162","jina":"FLORIDAH WANJA","pepea":"floridahwanja@yahoo.com","member_type":"1"},{"id":"163","jina":"MAINGO FELIX  OCHIENG'","pepea":"felixmaingo@gmail.com","member_type":"1"},{"id":"164","jina":"ODINDO EUGENE OTIENO","pepea":"odindoeugene@yahoo.com","member_type":"1"},{"id":"165","jina":"ABERE BRIAN","pepea":"aberebrian@gmail.com","member_type":"1"},{"id":"166","jina":"IAN  ONGERI  OKENG'O","pepea":"ianongeri061@gmail.com","member_type":"1"},{"id":"167","jina":"HILLARY  MOMANYI  MICHIRA","pepea":"hilarymichiz@gmail.com","member_type":"1"},{"id":"168","jina":"OTIENO WEDDY AKOTH","pepea":"weddyakoth@yahoo.com","member_type":"1"},{"id":"169","jina":"ADHIAMBO  SHEILA  MAXINE","pepea":"maxsheila2015@gmail.com","member_type":"1"},{"id":"170","jina":"YUSUF  MOSES  KWEMOI","pepea":"kwemoimoses@gmail.com","member_type":"1"},{"id":"171","jina":"EDWIN NYAKUNDI NYANG'AU ","pepea":"edwinken35@yahoo.com","member_type":"1"},{"id":"172","jina":"MOSES KUYO","pepea":"kaitikikeikuyo@gmail.com","member_type":"1"},{"id":"173","jina":"CLIFF KEBASO","pepea":"cliffkebaso@yahoo.com","member_type":"1"},{"id":"174","jina":"ISOE  OENDA  PARKINSON","pepea":"paryme7@gmail.com","member_type":"1"},{"id":"175","jina":"BOEN  K.  PETER","pepea":"peter.boen@gmail.com","member_type":"1"},{"id":"176","jina":"IRENE NYANCHERA","pepea":"inyanchera@yahoo.com","member_type":"1"},{"id":"177","jina":"RHODA  MORAA  AGWATA","pepea":"rhodaagwata@gmail.com","member_type":"1"},{"id":"178","jina":"DIANA  MOCHANA  AAMBA","pepea":"dianamachana86@gmail.com","member_type":"1"},{"id":"179","jina":"beverly awuor","pepea":"bevbridget@gmail.com","member_type":"1"},{"id":"180","jina":"MAXWELL ONYANGO OPIYO","pepea":"maxwelonyango77@gmail.com","member_type":"1"},{"id":"181","jina":"CHERUIYOT RONOH GILBERT ","pepea":"cheruronoh@yahoo.com","member_type":"1"},{"id":"182","jina":"OBOO  KEVIN  OGADA","pepea":"kevoo-ogada@yahoo.com","member_type":"1"},{"id":"183","jina":"NYABUTI   NDEGE  LAWRENCE","pepea":"nyabutilawrence@gmail.com","member_type":"1"},{"id":"184","jina":"FAITH NYAKUNDI","pepea":"bochaberinyak@gmail.com","member_type":"1"},{"id":"185","jina":"ELIZABETH OGETO","pepea":"elizabethkerush@gmail.com","member_type":"1"},{"id":"186","jina":"DAISY  MORAA","pepea":"Daisyonkoba@yahoo.com","member_type":"1"},{"id":"187","jina":"REBECA ADHIAMBO  ODURU","pepea":"rebecaoduru@gmail.com","member_type":"1"},{"id":"188","jina":"DAN OSORO","pepea":"dasorano@nokiamail.com","member_type":"1"},{"id":"189","jina":"JOEL ONYANGO ONONO","pepea":"joelonono@gmail.com","member_type":"1"},{"id":"190","jina":"HARRISON ANDEKO","pepea":"harriandeko.okinyo@gmail.com","member_type":"1"},{"id":"191","jina":"ANYONA  POLYCARP   MITAKI","pepea":"polycarpkyler@gmail.com","member_type":"1"},{"id":"192","jina":"CLEOPHAS  MAOYA  BIAGE","pepea":"maoyacleophas@gmail.com","member_type":"1"},{"id":"193","jina":"OMOLO ANYANGO EMILY","pepea":"emilyomoloany@gmail.com","member_type":"1"},{"id":"194","jina":"TRACY ACHIENG' OMONDI","pepea":"tracymorgan222.tm@gmail.com","member_type":"1"},{"id":"195","jina":"OTIENO DEPHINE","pepea":"linda.dephy@gmail.com","member_type":"1"},{"id":"196","jina":"ODORO M. KEVIN","pepea":"kevinodoro@yahoo.com","member_type":"1"},{"id":"197","jina":"EDMOND KIPROTICH TOWETT ","pepea":"kiproticheddy13@gmail.com","member_type":"1"},{"id":"198","jina":"ODHIAMBO KEVIN ODIPO","pepea":"odipokevine97@gmail.com","member_type":"1"},{"id":"199","jina":"HAGGRAY   MOKAYA  GICHANA","pepea":"haggraygichana70@gmail.com","member_type":"1"},{"id":"200","jina":"NICOLE LESSO APIYO","pepea":"lessonicole@gmail.com","member_type":"1"},{"id":"201","jina":"MAGETO   DEIROKE  MORAA","pepea":"deedeemoraa@gmail.com","member_type":"1"},{"id":"202","jina":"NYASUGUTA  FAITH TONG'I","pepea":"tongifaith@yahoo.com","member_type":"1"},{"id":"203","jina":"OMITI JOSEPH","pepea":"omitijoseph@gmail.com","member_type":"1"},{"id":"204","jina":"MASAI HILLARY","pepea":"hillarymasai@yahoo.com","member_type":"1"},{"id":"205","jina":"WICKLIFF MOSETI OGEGA","pepea":"moseldowcks@gmail.com","member_type":"1"},{"id":"206","jina":"JASON NYABUTO","pepea":"jasondimu@gmail.com","member_type":"1"},{"id":"207","jina":"KIRWA ALARN  KORIR","pepea":"koriralarnkirwa@gmail.com","member_type":"1"},{"id":"208","jina":"MILLICENT ALUOCH ONYANGO","pepea":"millzccliemo@gmail.com","member_type":"1"},{"id":"209","jina":"OTWORI MATUNDURA JEMIMAH","pepea":"jemimahotwori@gmail.com","member_type":"1"},{"id":"210","jina":"OTUMA WETIA BILLY","pepea":"billywetia@yahoo.com","member_type":"1"},{"id":"211","jina":"NYAMWEYA  JARED  NYANG'ARA","pepea":"jeredn778@gmail.com","member_type":"1"},{"id":"212","jina":"MARREN  NYAGAYA","pepea":"marrenanyagonyanyagaya@gmail.com","member_type":"1"},{"id":"213","jina":"MAINGI TERRY SHIRLEY","pepea":"tshmaingi@gmail.com","member_type":"1"},{"id":"214","jina":"PRISCAH TARITHU WAIRIMU","pepea":"priscah.wairimu@yahoo.com","member_type":"1"},{"id":"215","jina":"NGALA  VINCENT  OMONDI","pepea":"vincentngala20@gmail.com","member_type":"1"},{"id":"216","jina":"denis ngala","pepea":"denisochieng53@gmail.com","member_type":"1"},{"id":"217","jina":"OKEYO PHELIX OKOTH","pepea":"felix.okeyo@yahoo.com","member_type":"1"},{"id":"218","jina":"MOMANYI KEVIN OGOTI","pepea":"kevin.ogoti@yahoo.com","member_type":"1"},{"id":"219","jina":"EMMANUEL   ADIKA","pepea":"adikamunyao@gmail.com","member_type":"1"},{"id":"220","jina":"KENNETH  KIPKOECH","pepea":"kennethruto719@gmail.com","member_type":"1"},{"id":"221","jina":"ELVIS  KARINGA","pepea":"karingaelviz@gmail.com","member_type":"1"},{"id":"222","jina":"OKOTH  OLIVIA  WINNIE","pepea":"winnieodwogy@gmail.com","member_type":"1"},{"id":"223","jina":"CAROLINE  NDANU  MUTUNGA","pepea":"carondanu2@gmail.com","member_type":"1"},{"id":"224","jina":"EUCABETH KERUBO NYAMWEYA","pepea":"enamekerubo@yahoo.com","member_type":"1"},{"id":"225","jina":"ERIC OMONDI","pepea":"olooomondi.erick@yahoo.com","member_type":"1"},{"id":"226","jina":"OYARO A. JOB","pepea":"jobyaros@gmail.com","member_type":"1"},{"id":"227","jina":"CHERUIYOT DISMAS KIPRONO","pepea":"cherudckip@gmail.com","member_type":"1"},{"id":"228","jina":"LAGAT  K. CALEB","pepea":"caleblagat@gmail.com","member_type":"1"},{"id":"229","jina":"ESTHER MORAA NYARIKI","pepea":"esthermoraa@yahoo.com","member_type":"1"},{"id":"230","jina":"ANYANGO  MARTHA","pepea":"marthaanyango.ma@gmail.com","member_type":"1"},{"id":"231","jina":"ZADDOCK OMONDI ODUOR","pepea":"zaddock09@gmail.com","member_type":"1"},{"id":"232","jina":"OKIOMA  MONICA  KWAMBOKA","pepea":"mony.white50@gmail.com","member_type":"1"},{"id":"233","jina":"Bett Silas","pepea":"silazkaybett@gmail.com","member_type":"1"},{"id":"234","jina":"OPIYO ISAAC OWUOR","pepea":"isaacopiyo404@gmail.com","member_type":"1"},{"id":"235","jina":"MOKUA  MONYANCHA  EDWIN","pepea":"mokuaedwin3@gmail.com","member_type":"1"},{"id":"236","jina":"MILLICENT M. OGETO","pepea":"millyogeto@rocketmail.com","member_type":"1"},{"id":"237","jina":"ZIPPORAH JEMUTAI BIRECH","pepea":"ee3bombay@gmail.com","member_type":"1"},{"id":"238","jina":"Kones  Cheruiyot","pepea":"fcheruiyot88@gmail.com","member_type":"1"},{"id":"239","jina":"Clifford Nate's","pepea":"betaclifford@gmail.com","member_type":"1"},{"id":"240","jina":"ISAAC ONCHIEKU OGEGA","pepea":"isaac.onchieku@students.ac.ke","member_type":"1"},{"id":"241","jina":"WAFULA KEVIN  MWANGI","pepea":"mwashavin@gmail.com","member_type":"1"},{"id":"242","jina":"JOSEPH   MUNYI","pepea":"josseymunyi@gmail.com","member_type":"1"},{"id":"243","jina":"JACK NJUBI","pepea":"joevee986@gmail.com","member_type":"1"},{"id":"244","jina":"SOITA  NECHESA  VIOLET","pepea":"violetsoita@yahoo.com","member_type":"1"},{"id":"245","jina":"KIMUTAI  NICKSON","pepea":"nickisonkimutai@gmail.com","member_type":"1"},{"id":"246","jina":"RUTH A AUGO","pepea":"ruthaugo40@gmail.com","member_type":"1"},{"id":"247","jina":"PAUL MIDIGO CHARLES","pepea":"midigopaul@yahoo.com","member_type":"1"},{"id":"248","jina":"BERA BRIAN KIBET","pepea":"berakibet@live.com","member_type":"1"},{"id":"249","jina":"ERIC OKOTH OTIENO","pepea":"otieno-eric@yahoo.com","member_type":"1"},{"id":"250","jina":"ONGAKI KERAGORI WILKE","pepea":"wilkekeragori@yahoo.com","member_type":"1"},{"id":"251","jina":"JOHN ALEX OGOLA ORANDA","pepea":"johnalexaranda10@gmail.com","member_type":"1"},{"id":"252","jina":"KISASAM  EMMANUEL  KIPSANG","pepea":"kipsangema@gmail.com","member_type":"1"},{"id":"253","jina":"JUMA LINDA AKINYI","pepea":"lyndakendyjuma@gmail.com","member_type":"1"},{"id":"254","jina":"MUORIA  STACY   W.","pepea":"stcebobo82@gmail.com","member_type":"1"},{"id":"255","jina":"MARTIN MWEGI","pepea":"mwegiy@gmail.com","member_type":"1"},{"id":"256","jina":"KEN NALLO WASONGA","pepea":"kenwasonga1994@gmail.com","member_type":"1"},{"id":"257","jina":"OMBONGI KELVIN OMBATI","pepea":"kelvineombati@ymail.com","member_type":"1"},{"id":"258","jina":"JOHN   ONSONGO   MABEYA","pepea":"jonnyosongo@gmail.com","member_type":"1"},{"id":"259","jina":"IVONE KERUBO MASARA","pepea":"ivone.keri@gmail.com","member_type":"1"},{"id":"260","jina":"MICHIRA  CHRISTOBEL  KWAMBOKA","pepea":"msmshane4@gmail.com","member_type":"1"},{"id":"261","jina":"AKOTH  SHARON OKETCH","pepea":"oketchshaz21@gmail.com","member_type":"1"},{"id":"262","jina":"ERICK OBIRI","pepea":"erickobiri@gmail.com","member_type":"1"},{"id":"263","jina":"NYANGENA KEVIN ONSATE ","pepea":"nyangenakelivin@nokiamail.com","member_type":"1"},{"id":"264","jina":"MANOTI N. VALENTINE","pepea":"valentinadiaz@gmail.com","member_type":"1"},{"id":"265","jina":"DENNIS KIPROTICH","pepea":"kiprotich.dennis2013@gmail.com","member_type":"1"},{"id":"266","jina":"ALLAN  SHEAR  OCHIENG","pepea":"shearallan63@gmail.com","member_type":"1"},{"id":"267","jina":"OTIENO  O  HENRY","pepea":"henryotieno66@gmail.com","member_type":"1"},{"id":"268","jina":"JULLIANE NYABOKE BOSIRE","pepea":"jullianne.bosire@yahoo.com","member_type":"1"},{"id":"269","jina":"Juliet Nekesa","pepea":"julietcheng32@gmail.com","member_type":"1"},{"id":"270","jina":"KURIA  EVALYNE  WANJIRU","pepea":"eveshamsiah@gmail.com","member_type":"1"},{"id":"271","jina":"FELIX MBOYA","pepea":"felahmomix@yahoo.com","member_type":"1"},{"id":"272","jina":"SMITH HARMSTON ","pepea":"smitharmstones@gmail.com","member_type":"1"},{"id":"273","jina":"JOSHUA OMARI","pepea":"omarijoshua12@gmai.com","member_type":"1"},{"id":"274","jina":"LYBON N. OKIRO","pepea":"lybonokiro@gmail.com","member_type":"1"},{"id":"275","jina":"ABONG'O  BARAKA  HUMPHREY","pepea":"humphreybaraka013@gmail.com","member_type":"1"},{"id":"276","jina":"KIPKORIR  ARON  LANGAT","pepea":"kipkoriraron@gmail.com","member_type":"1"},{"id":"277","jina":"CHEPKWONY  C  VIOTRY","pepea":"viocheps@gmail.com","member_type":"1"},{"id":"278","jina":"MAGETO  ANNE  KERUBO","pepea":"annkerubo20@gmail.com","member_type":"1"},{"id":"279","jina":"MILLIANE   OMOLO","pepea":"millianemarianah@gmail.com","member_type":"1"},{"id":"280","jina":"SETH ONYONO","pepea":"sethomwenga@gmail.com","member_type":"1"},{"id":"281","jina":"OMONDI PHELIX","pepea":"p.omondi@yahoo.com","member_type":"1"},{"id":"282","jina":"PETER GITONGA MUTEGI","pepea":"gpmutegi@gmail.com","member_type":"1"},{"id":"283","jina":"Kiprotich Brian","pepea":"lagatbrayan@gmail.com","member_type":"1"},{"id":"284","jina":"MUTHIKE  DUNCUN  MWANGI","pepea":"muthikeduncan@gmail.com","member_type":"1"},{"id":"285","jina":"JUNE   HELLEN ODERA","pepea":"jadera76@gmail.com","member_type":"1"},{"id":"286","jina":"YVONE  ZENAMINE  AKELLO","pepea":"zenamineyvone86@gmail.com","member_type":"1"},{"id":"287","jina":"MAGATI BENSON MATARA","pepea":"magarabenson@gmail.com","member_type":"1"},{"id":"288","jina":"NGALO  JORDAN  OPONDO","pepea":"jordanngalo96@gmail.com","member_type":"1"},{"id":"289","jina":"PETER  EVANCE  MBITHI","pepea":"evanmbithi@gmail.com","member_type":"1"},{"id":"290","jina":"RATEMO  WYCLIFFE  NYASANI","pepea":"nyasonowycliffe@gmail.com","member_type":"1"},{"id":"291","jina":"CYNTHIA MORAA KIMANI","pepea":"cynthiamoraa@gmail.com","member_type":"1"},{"id":"292","jina":"KIARIE  SHEILA   WAMANDI","pepea":"wamandikiarie@gmail.com","member_type":"1"},{"id":"293","jina":"Ian Otieno","pepea":"ianscott7619@gmail.com","member_type":"1"},{"id":"294","jina":"ANN WANJIKU GATUMA","pepea":"anngatuma@gmail.com","member_type":"1"},{"id":"295","jina":"ABIMELECH BENZI","pepea":"abimelech.maranga@gmail.com","member_type":"1"},{"id":"296","jina":"OCHIENG'  DERICK  OGUM","pepea":"deriqueinogum@gmail.com","member_type":"1"},{"id":"297","jina":"ROYLEX  KINGI","pepea":"kinigiroylex@gmail.com","member_type":"1"},{"id":"298","jina":"WASONGA  BYRONE  OJALLAH","pepea":"wasongabyrone15@gmail.com","member_type":"1"},{"id":"299","jina":"NYABUTO LILIAN MORAA","pepea":"lilianmoraa7@gmail.com","member_type":"1"},{"id":"300","jina":"NYAKUNDI  KWAMBOKA  LENCER","pepea":"kwamboka1996@gmail.com","member_type":"1"},{"id":"301","jina":"ESTHER BASWETI","pepea":"estherbasweti@gmail.com","member_type":"1"},{"id":"302","jina":"BERE GEOFFREY NYAKOL","pepea":"geoffreynauas@yahoo.com","member_type":"1"},{"id":"303","jina":"ONSOTI NYACHIO FEDNARD","pepea":"onsotifednard@gmail.com","member_type":"1"},{"id":"304","jina":"NEMROD  MANDUKU  NYAGWACHI","pepea":"nmandukumails@gmail.com","member_type":"1"},{"id":"305","jina":"ANJERE  IRVINE  AMUKASA","pepea":"amukach@gmail.com","member_type":"1"},{"id":"306","jina":"DIANA ATIENO JUSTUS","pepea":"dianajustus@gmail.com","member_type":"1"},{"id":"307","jina":"NASIRUMBI   NEEMA","pepea":"nnasirumbi@gmail.com","member_type":"1"},{"id":"308","jina":"Dina Elsie","pepea":"dinaelsie12@gmail.com","member_type":"1"},{"id":"309","jina":"OMARI  HOPE  JUNIOR  ","pepea":"gustavolippi95@gmail.com","member_type":"1"},{"id":"310","jina":"STEVEN OGINGA","pepea":"stevilley@gmail.com","member_type":"1"},{"id":"311","jina":"Mark Rongoei","pepea":"mk.rongoei@gmail.com","member_type":"1"},{"id":"312","jina":"ELIZABETH ODHIAMBO","pepea":"elizabethodhiambo73@yahoo.com","member_type":"1"},{"id":"313","jina":"PHILLIP ABNER BWANA","pepea":"pirannahr@yahoo.com","member_type":"1"},{"id":"314","jina":"Cliffor Beta","pepea":"beyjoddy@gmail.com","member_type":"1"},{"id":"315","jina":"NELSON  KENYANSA","pepea":"Kenyansa10@gmail.com","member_type":"1"},{"id":"316","jina":"reagane ochieng","pepea":"reagane94akoko@gmail.com","member_type":"1"},{"id":"317","jina":"Hillary  omari","pepea":"omarihillary2117@gmail.com","member_type":"1"},{"id":"318","jina":"Dorothy Akinyi","pepea":"odhiamboakinyi160@gmail.com","member_type":"1"},{"id":"319","jina":"Brian  Omondi","pepea":"obongobrian@gmail.com","member_type":"1"},{"id":"320","jina":"chacha samuel","pepea":"chachasamuel14@gmail.com","member_type":"1"},{"id":"321","jina":"Marube Wisley","pepea":"marubewisley@gmail.com","member_type":"1"},{"id":"322","jina":"ogum Derick","pepea":"derickogum@gmail.com","member_type":"1"},{"id":"323","jina":"Franco Mukumu","pepea":"francomukumu@gmail.com","member_type":"1"},{"id":"324","jina":"Samson  Oduor","pepea":"samsipem@gmail.com","member_type":"1"},{"id":"325","jina":"Ronoh Silah","pepea":"timtoo071@gmail.com","member_type":"1"},{"id":"326","jina":"Amos Nyandika","pepea":"amosnyandiks@gmail.com","member_type":"1"},{"id":"327","jina":"Emily Nyambane","pepea":"emilynyabuto@gmail.com","member_type":"1"},{"id":"328","jina":"Brenda Asande","pepea":"brendaasande@gmail.com","member_type":"1"},{"id":"329","jina":"Joe Kamunyu","pepea":"josekamunyu@gmail.com","member_type":"1"},{"id":"330","jina":"ongubo venick","pepea":"ongubovenick@gmail.com","member_type":"1"},{"id":"331","jina":"Moreen Rosana","pepea":"moreenros@gmail.com","member_type":"1"},{"id":"332","jina":"Obed Ogaro","pepea":"obedniz@gmail.com","member_type":"1"},{"id":"333","jina":"Peter Kibagendi","pepea":"detter5kibagendi@gmail.com","member_type":"1"},{"id":"334","jina":"ASKAH MORAGWA","pepea":"moragwaaskah@gmail.com","member_type":"1"},{"id":"335","jina":"Patrick Mekenye","pepea":"mekenyepatrick@yahoo.com","member_type":"1"},{"id":"336","jina":"Daniel Kung'u","pepea":"kungudan1@gmail.com","member_type":"1"},{"id":"337","jina":"oruru Wycliffe","pepea":"moruru70@gmail.com","member_type":"1"},{"id":"338","jina":"Korir  Allan","pepea":"allankor13@gmail.com","member_type":"1"},{"id":"339","jina":"Charles  Osio","pepea":"charlesosio6@gmail.com","member_type":"1"},{"id":"340","jina":"millicent kemunto","pepea":"milliekemmmy@gmail.com","member_type":"1"},{"id":"341","jina":"BENTA ONGEGU","pepea":"bentao36@gmail.com","member_type":"1"},{"id":"342","jina":"ogega Enosh","pepea":"enoshogega@yahoo.com","member_type":"1"},{"id":"343","jina":"Raphael kenyuri","pepea":"raphaelkenyuri@gmail.com","member_type":"1"},{"id":"344","jina":"Clifford Onyonka","pepea":"onyonkaclifford@hotmail.com","member_type":"1"},{"id":"345","jina":"reginald onsongo","pepea":"onsoregi@gmail.com","member_type":"1"},{"id":"346","jina":"Joseph Otieno","pepea":"josephotieno380@gmail.com","member_type":"1"},{"id":"347","jina":"ian mesota","pepea":"ianmesota@gmail.com","member_type":"1"},{"id":"348","jina":"BENJAMIN MAYAKA","pepea":"ogarobenjamin77@gmail.com","member_type":"1"},{"id":"349","jina":"Cyrus Gichana","pepea":"cyrusgichana@gmail.com","member_type":"1"},{"id":"350","jina":"Nyawade  Faith","pepea":"nyawadefaith@gmail.com","member_type":"1"},{"id":"351","jina":"kiabusa Abel obaga","pepea":"kiabzbaga@gmail.com","member_type":"1"},{"id":"352","jina":"Nyawade Faith","pepea":"nyawadefaih@gmail.com","member_type":"1"},{"id":"353","jina":"Joel  Nyamboga  Nyaribo","pepea":"joelnyaribo84@gmail.com","member_type":"1"},{"id":"354","jina":"leila nyabate","pepea":"ismaserry@gmail.com","member_type":"1"},{"id":"355","jina":"Omondi Phelix","pepea":"phelixaloo@gmail.com","member_type":"1"},{"id":"356","jina":"Alfred Motanya","pepea":"motanyaalfred@gmail.com","member_type":"1"},{"id":"357","jina":"Yusuf Musa","pepea":"m.yusuf7@yandex.com","member_type":"1"},{"id":"358","jina":"Cedric Kiplimo","pepea":"kiplimock@gmail.com","member_type":"1"},{"id":"359","jina":"Jared Adem","pepea":"jaredadem67@gmail.com","member_type":"1"},{"id":"360","jina":"Samuel kuria","pepea":"mwathisamuel029@gmail.com","member_type":"1"},{"id":"361","jina":"timothy osano","pepea":"osanotimothy@gmail.com","member_type":"1"},{"id":"362","jina":"emanuel otieno","pepea":"emanuelotii@gmail.com","member_type":"1"},{"id":"363","jina":"kennedy chirchir","pepea":"kennedychirchir988@gmail.com","member_type":"1"},{"id":"364","jina":"robert kimaiga","pepea":"rkimaiga@gmail.com","member_type":"1"},{"id":"365","jina":"Esther Basweti","pepea":"estherbasweti.be@gmail.com","member_type":"1"},{"id":"366","jina":"Tanya Nicole","pepea":"taniconyango60@gmail.com","member_type":"1"},{"id":"367","jina":"Lybon Okiro","pepea":"lybonokiro@yahoo.com","member_type":"1"},{"id":"368","jina":"moses kuyo","pepea":"kaitikeikuyo@gmail.com","member_type":"1"},{"id":"369","jina":"Stacy Kwamboka","pepea":"staceyachoki@gmail.com","member_type":"1"},{"id":"370","jina":"C C","pepea":"betacfford@gma.com","member_type":"1"},{"id":"371","jina":"Carolyne kerubo","pepea":"carolmarendi@gmail.com","member_type":"1"},{"id":"372","jina":"lawrence sagini","pepea":"sagini.lawrence@students.jkuat.ac.ke","member_type":"1"},{"id":"373","jina":"REBECCAH  AJOWI","pepea":"beckieajowi@gmail.com","member_type":"1"},{"id":"374","jina":"Grace Kwamboka","pepea":"neemahkuvukah@gmail.com","member_type":"1"},{"id":"375","jina":"victor nyakundi","pepea":"vvic202@gmail.com","member_type":"1"},{"id":"376","jina":"shadrack omulo","pepea":"246824.so@gmail.com","member_type":"1"},{"id":"377","jina":"Deborah Martin","pepea":"dimatins769@gmail.com","member_type":"1"},{"id":"378","jina":"Wycliffe Nyasani","pepea":"nyasaniwycliffe@gmail.com","member_type":"1"},{"id":"379","jina":"Caleb Ogeto","pepea":"calebogeto9@gmail.com","member_type":"1"},{"id":"380","jina":"Edwin Ong'era","pepea":"edwinongera@outlook.com","member_type":"1"},{"id":"381","jina":"ADA ATIENO","pepea":"adatieno.8@gmail.com","member_type":"1"},{"id":"382","jina":"Jacinta  wanjiru","pepea":"wanjirujacinta@gmail.com","member_type":"1"},{"id":"383","jina":"JOSHUA OCHENGE","pepea":"joshuaochenge@gmail.com","member_type":"1"},{"id":"384","jina":"Fehbius Mandela","pepea":"fehbius@gmail.com","member_type":"1"},{"id":"385","jina":"EREQ ERQRT","pepea":"REE@adsa.com","member_type":"1"},{"id":"386","jina":"naomi  chebet","pepea":"bettynaomi1996@gmail.com","member_type":"1"},{"id":"387","jina":"chebet peninah","pepea":"chebetk5@gmail.com","member_type":"1"},{"id":"388","jina":"Esther Achieng","pepea":"osako.esther@gmail.com","member_type":"1"},{"id":"389","jina":"Hillary  Kimaiga","pepea":"hillarymwendi@gmail.com","member_type":"1"},{"id":"390","jina":"Stephen Kiplimo","pepea":"alejendrosteve1@gmail.com","member_type":"1"},{"id":"391","jina":"RAEL KEMUNTO","pepea":"obarerael@gmail.com","member_type":"1"},{"id":"392","jina":"Dennis  were","pepea":"weredennis010@gmail.com","member_type":"1"},{"id":"393","jina":"Wilbur  Omae","pepea":"wilburomae@gmail.com","member_type":"1"},{"id":"394","jina":"Kelvin Mong'are","pepea":"mongarekelvin@gmail.com","member_type":"1"},{"id":"395","jina":"Naomo kerubo","pepea":"namiliz@gmail.com","member_type":"1"},{"id":"396","jina":"caleb omariba","pepea":"calebomariba1993@gmail.com","member_type":"1"},{"id":"397","jina":"vennah","pepea":"niviejoez@gmail.com","member_type":"1"},{"id":"398","jina":"mercy atieno","pepea":"qtymercy@gmail.com","member_type":"1"},{"id":"399","jina":"Chepkemoi  Joan","pepea":"chepkemoijoan0@gmail.com","member_type":"1"},{"id":"400","jina":"OLOO O. ALFRED","pepea":"olooalfredo@gmail.com","member_type":"1"},{"id":"401","jina":"OGOLLA ENOCK","pepea":"OGOLENOCK2016@GMAIL.COM","member_type":"1"},{"id":"402","jina":"DOUGLAS ONDIEKI","pepea":"douglasonyango5330@gmail.com","member_type":"1"},{"id":"403","jina":"Test student","pepea":"testator123@gmail.com","member_type":"1"},{"id":"404","jina":"BIOTIVITY","pepea":"cbiotivity@gmail.com","member_type":"1"},{"id":"405","jina":"BIOTIVITY","pepea":"zcbiotivity@gmail.com","member_type":"1"}]}

#Group Associate

##Add associate [/associate]

This call creates the record of a new associate in the database, it also updates the detials of the student if already existing.

+ Parameters
 
    + api-key (required, string, `'123456'`)  
    + name (required, string, `'Zephaniah Adar'`) ... String `name` of the user being created.
    + phone (required, string, `'0701411321'`) ... String `phone` of the user being created.
    + email (required, string, `adarzeph@gmail.com`) ... String `name` of the user being created.
    + gender (required, string, `'M'`) ... String `gender` of the user being created, M/F.
   

### Reference [POST]
+ Request (application/json)

        {"api-key":"123456","name":"Zephaniah Adar","email":"adarzeph@gmail.com","phone":"0701411321","gender":"M"}

+ Response 200 (application/json)

{"status":"Success","message":"Member inserted successfully"}

## Retrieve associates [/assocget]

This call retrieves all associate details.
+ Parameters
 
    + api-key (required, string, `'123456'`) ... String `api key`.
   

### Reference [POST]
+ Request (application/json)

        {"api-key":"123456"}

+ Response 200 (application/json)

{"status":"Success","message":[{"id":"1","jina":"ABIGAEL OMOKE","pepea":"abigaelomoke@yahoo.com","member_type":"2"},{"id":"2","jina":"ACHIENG' BERYL","pepea":"beshachieng@gmail.com","member_type":"2"},{"id":"3","jina":"ADUKE RHODA","pepea":"rhodaduke@yahoo.com","member_type":"2"},{"id":"4","jina":"AKINYI NELLY MANYALA","pepea":"nellymanyala@yahoo.com","member_type":"2"},{"id":"5","jina":"ANDREW MAGETO","pepea":"otegamic2008@yahoo.com","member_type":"2"},{"id":"6","jina":"ANNDEAR W. GICHUHI","pepea":"anndearbenson@yahoo.com","member_type":"2"},{"id":"7","jina":"APINDI","pepea":"capindi86@yahoo.com","member_type":"2"},{"id":"8","jina":"ATAI OREN","pepea":"atai.oren@gmail.com","member_type":"2"},{"id":"9","jina":"AUGUSTUS KAMAU","pepea":"augustuskamau@gmail.com","member_type":"2"},{"id":"10","jina":"AUMA EDITH","pepea":"edithauma@gmail.com","member_type":"2"},{"id":"11","jina":"BENARD MUMO","pepea":"benmakaa@gmail.com","member_type":"2"},{"id":"12","jina":"BENARD OBOSO","pepea":"oboso.benard@yahoo.com","member_type":"2"},{"id":"13","jina":"BENARD SEGECHA","pepea":"segbernto@gmail.com","member_type":"2"},{"id":"14","jina":"BILHAH KERUBO NYAINGO","pepea":"bilhahnyaingo@ymail.com","member_type":"2"},{"id":"15","jina":"BLAISE MUNYEMANA","pepea":"blaisemun@yahoo.com","member_type":"2"},{"id":"16","jina":"BUYAKI PENORAH","pepea":"penobuy@gmail.com","member_type":"2"},{"id":"17","jina":"CHEBEO DANIEL","pepea":"chebeojnr@gmail.com","member_type":"2"},{"id":"18","jina":"CHELIMO NAOMI","pepea":"naomichelimo@gmail.com","member_type":"2"},{"id":"19","jina":"CHEMOOS SAMSON","pepea":"kchemoos@gmail.com","member_type":"2"},{"id":"20","jina":"CHEMUTAI","pepea":"pchemtai@gmail.com","member_type":"2"},{"id":"21","jina":"CHIEF OKAL","pepea":"acondrews@gmail.com","member_type":"2"},{"id":"22","jina":"DAMARIS MBOI","pepea":"2007damahmboi@gmail.com","member_type":"2"},{"id":"23","jina":"DAVID KWALANDA","pepea":"davidkwalanda@yahoo.com","member_type":"2"},{"id":"24","jina":"DIANA MAGETO","pepea":"x.mageto.x@gmail.com","member_type":"2"},{"id":"25","jina":"DUNCAN WANDIGA","pepea":"mathewdan@rocketmail.com","member_type":"2"},{"id":"26","jina":"EDWIN ONG'AYO","pepea":"edwin.onkendu@gmail.com","member_type":"2"},{"id":"27","jina":"ELIZABETH OGETO","pepea":"elizabethkerush@gmail.com","member_type":"2"},{"id":"28","jina":"ELPHAS OKANG'A","pepea":"kangphas@gmail.com","member_type":"2"},{"id":"29","jina":"EMMY JERONO","pepea":"ejerono3@gmail.com","member_type":"2"},{"id":"30","jina":"ERIC OTIENO NYAWATA","pepea":"nyawataerick@yahoo.com","member_type":"2"},{"id":"31","jina":"ESTHER MOMANYI","pepea":"emomanyik@gmail.com","member_type":"2"},{"id":"32","jina":"GASTONE ODIWUOR","pepea":"gogakapish@gmail.com","member_type":"2"},{"id":"33","jina":"GISEMBA CHRISTOPHER","pepea":"chrisgisemba@gmail.com","member_type":"2"},{"id":"34","jina":"GITAU K. JOSEPH","pepea":"gitaujoeh@gmail.com","member_type":"2"},{"id":"35","jina":"HARRY KICHE","pepea":"harryodiwuor@yahoo.com","member_type":"2"},{"id":"36","jina":"HILLARY KOROS","pepea":"korosmunga@yahoo.com","member_type":"2"},{"id":"37","jina":"ISAAC NYANGENA O.","pepea":"nyangenaisaac@ymail.com","member_type":"2"},{"id":"38","jina":"JAMES ATINDA","pepea":"atindajaz@gmail.com","member_type":"2"},{"id":"39","jina":"JANE KERUBO MOMANYI","pepea":"jakemo23@yahoo.com","member_type":"2"},{"id":"40","jina":"JAPHETH OJWANG'","pepea":"japhojwang@gmail.com","member_type":"2"},{"id":"41","jina":"JEREMIAH OKOTH","pepea":"okothjeremiah818@yahoo.com","member_type":"2"},{"id":"42","jina":"JOHN OUMA","pepea":"johnouma55@yahoo.com","member_type":"2"},{"id":"43","jina":"KADE CAROL","pepea":"kadecarol@yahoo.com","member_type":"2"},{"id":"44","jina":"KANDAYA BASIL","pepea":"kandayab@yahoo.com","member_type":"2"},{"id":"45","jina":"KEMUNTO LEONAH","pepea":"leonahkemunto@yahoo.com","member_type":"2"},{"id":"46","jina":"KERUBO RISPER","pepea":"risperkerry0@gmail.com","member_type":"2"},{"id":"47","jina":"KERUBO SHALYNE","pepea":"shalyne.kerubo@yahoo.com","member_type":"2"},{"id":"48","jina":"KIHIU ESTHER","pepea":"kihiu.esther@yahoo.com","member_type":"2"},{"id":"49","jina":"KIPCHUMBA ALLAN","pepea":"allankip1994@gmail.com","member_type":"2"},{"id":"50","jina":"K'OTOHOYOH FLOYD","pepea":"floydkots@gmail.com","member_type":"2"},{"id":"51","jina":"LENAH","pepea":"lenahkad@yahoo.com","member_type":"2"},{"id":"52","jina":"MARRIANE MONG'ERI","pepea":"mmongeri@live.com","member_type":"2"},{"id":"53","jina":"MAXWELL NGALA","pepea":"maxngala@gmail.com","member_type":"2"},{"id":"54","jina":"MERCY NYAKUNDI","pepea":"nyakundi.mercy@yaoo.com","member_type":"2"},{"id":"55","jina":"MICAH OKEYO","pepea":"m.okeyo@yahoo.com","member_type":"2"},{"id":"56","jina":"MICHAEL OMURWA","pepea":"michaelomurwa@gmail.com","member_type":"2"},{"id":"57","jina":"MIGIRO HERBERT","pepea":"herbmig@gmail.com","member_type":"2"},{"id":"58","jina":"MOSETI DENNIS","pepea":"mosetidee@gmail.com","member_type":"2"},{"id":"59","jina":"MULANG' ISAIAH","pepea":"icesiremulacs@gmail.com","member_type":"2"},{"id":"60","jina":"MUNYEMANA BLAISE","pepea":"blaisemun@gmail.com","member_type":"2"},{"id":"61","jina":"MWERO","pepea":"mwero002@gmail.com","member_type":"2"},{"id":"62","jina":"MWIHAKI NAOMI","pepea":"naomimwhk@gmail.com","member_type":"2"},{"id":"63","jina":"NAOMI KERUBO BIRUNDU","pepea":"naomibirundu@yahoo.com","member_type":"2"},{"id":"64","jina":"NTOINYA KENDI ANN","pepea":"annkendi@gmail.com","member_type":"2"},{"id":"65","jina":"NYAKUNDI VINCENT","pepea":"vinyakundi@ymail.com","member_type":"2"},{"id":"66","jina":"NYANGENA DOROTHY","pepea":"dorothynyangena@gmail.com","member_type":"2"},{"id":"67","jina":"OBONYO EVANS","pepea":"eobonyo3@gmail.com","member_type":"2"},{"id":"68","jina":"ODHIAMBO JOHN","pepea":"odhiambojohn32@yahoo.com","member_type":"2"},{"id":"69","jina":"ODUO WYCLIFFE","pepea":"oduowicklif@yahoo.com","member_type":"2"},{"id":"70","jina":"OGOLA SAMUEL","pepea":"samuelogola88@yahoo.com","member_type":"2"},{"id":"71","jina":"OJWANG' EMMANUEL","pepea":"ojwangmanu@gmail.com","member_type":"2"},{"id":"72","jina":"OKAL PHILIP","pepea":"philipokal@gmail.com","member_type":"2"},{"id":"73","jina":"OKOTH LUCAS","pepea":"lucasokoth@yahoo.com","member_type":"2"},{"id":"74","jina":"OMBIJA STEPHEN","pepea":"ombijastephen@yahoo.com","member_type":"2"},{"id":"75","jina":"ONDIKO","pepea":"ed.ondiko@gmail.com","member_type":"2"},{"id":"76","jina":"ONDUSO EZRA","pepea":"ezraonduso@gmail.com","member_type":"2"},{"id":"77","jina":"ONG'ONG'A ROY","pepea":"roy.ongonga@gmail.com","member_type":"2"},{"id":"78","jina":"OPANA SAMUEL","pepea":"sam.opana@gmail.com","member_type":"2"},{"id":"79","jina":"PAUL OCHIENG","pepea":"ochiengpol@gmail.com","member_type":"2"},{"id":"80","jina":"PETER NYABUTO","pepea":"pmambia@gmail.com","member_type":"2"},{"id":"81","jina":"PONDE ZADDOCK OPIYO","pepea":"pondezedd@gmail.com","member_type":"2"},{"id":"82","jina":"ROP CHESANG NAOMI","pepea":"naomirop@yahoo.com","member_type":"2"},{"id":"83","jina":"SAMUEL KIPYEGON","pepea":"samkipyegon@gmail.com","member_type":"2"},{"id":"84","jina":"SHALYNE KERUBO O.","pepea":"shalyne.kerubo@gmail.com","member_type":"2"},{"id":"85","jina":"SHARON ACHIENG\u2019","pepea":"shazachieng@gmail.com","member_type":"2"},{"id":"86","jina":"VALLARY PRIDE","pepea":"ebonypride12@gmail.com","member_type":"2"},{"id":"87","jina":"VERA BONARERI","pepea":"nyachwayav@yahoo.com","member_type":"2"},{"id":"88","jina":"VIVIAN BRIGHT","pepea":"vivib08@gmail.com","member_type":"2"},{"id":"89","jina":"WANYONYI ALEX","pepea":"wanyonyialex@gmail.com","member_type":"2"},{"id":"90","jina":"WASIKE METRINE","pepea":"mettywasike2013@gmail.com","member_type":"2"},{"id":"91","jina":"WINNIE NYONJE","pepea":"winnienyonje@yahoo.com","member_type":"2"},{"id":"92","jina":"WINNIE OWINO","pepea":"winniell@yahoo.com","member_type":"2"},{"id":"93","jina":"ZILLY APONDI","pepea":"zapondi@gmail.com","member_type":"2"},{"id":"100","jina":"Brian Onang'o","pepea":"surgbc@gmail.com","member_type":"2"}]}


# Group Member 

## Register new members [/register]

Call creates a record of a new member in the db.

+   parameters

    + api-key (required, string, `'123456'`)
    + email (required,string, `'betaclifford@gmail.com`')
    + name (required,string, `'Clifford Beta'`)
    + phone (string, `'0706677565'`)
    + year_of_study (int, `4`) ...Member year of study.
    + date_signed_up (string, `'2016-06-22 08:32:21'`) ...Date of member sign up.
    + gender (string, `'M'`)
    + type (int, `1`) ... 1- for student, 2-associate,3-visitor.
    + date_of_birth (string, `'1991'`).
    + regno (string, `'EN-273-0628/2013'`).
    + course (string , `'TIE'`).
    + baptismal_status (int, `2`) ... 1-baptised, 2-not baptised.
    + membership (int, `1`) ... 1-Registered member, 2- Sabbath school m
    + password (string, `'12345'`)

### Reference [POST]

+ Request (application/json)

{"api-key":"123456","name":"Clifford","email":betaclifford@gmail.com","type":1,"gender":"M","phone":"0706677565"}

+ Response 200 (application/json)

{"status":true,"message":"Member inserted successfully"}

## Retrieve members [/memberget]

Call retrieves all members by default or certain members based on certain filters.

+   parameters

    + api-key (required, string, `'123456'`)
    + id (int,`2`) ...Member `id`.
    + email (string, `'betaclifford@gmail.com`')
    + name (string, `'Clifford Beta'`)
    + phone (string, `'0706677565'`)
    + year_of_study (int, `4`) ...Member year of study.
    + date_signed_up (string, `'2016-06-22 08:32:21'`) ...Date of member sign up.
    + gender (string, `'M'`)
    + type (int, `1`) ... 1- for student, 2-associate,3-visitor.
    + date_of_birth (string, `'1991'`).
    + regno (string, `'EN-273-0628/2013'`).
    + course (string , `'TIE'`).
    + baptismal_status (int, `2`) ... 1-baptised, 2-not baptised.
    + membership (int, `1`) ... 1-Registered member, 2- Sabbath school m
    + password (string, `'12345'`)

    
    
    
    
### Reference [POST]

+ Request (application/json)

{"api-key":"123456"}

+ Response 200 (application/json)

{"status":true,"message":[{"id":"1","name":"Beta C W","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"0000-00-00 00:00:00","yos":"0"},{"id":"2","name":"Beta C W","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"0000-00-00 00:00:00","yos":"0"},{"id":"3","name":"Beta C W","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"0000-00-00 00:00:00","yos":"0"},{"id":"4","name":"Beta C W","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"0000-00-00 00:00:00","yos":"0"},{"id":"5","name":"Beta C W","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"0000-00-00 00:00:00","yos":"0"},{"id":"6","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"0000-00-00 00:00:00","yos":"0"},{"id":"7","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"0000-00-00 00:00:00","yos":"0"},{"id":"8","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"0","date_signed_up":"2016-06-22 08:16:41","yos":"0"},{"id":"9","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"1","date_signed_up":"2016-06-22 08:17:23","yos":"0"},{"id":"10","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"1","date_signed_up":"2016-06-22 08:18:18","yos":"0"},{"id":"11","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"1","date_signed_up":"2016-06-22 08:21:24","yos":"0"},{"id":"12","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"1","date_signed_up":"2016-06-22 08:21:30","yos":"0"},{"id":"13","name":"test","phone":"0706677565","email":"CWB@gmail.com","gender":"","type":"1","date_signed_up":"2016-06-22 08:21:32","yos":"0"},{"id":"14","name":"test","phone":"0706677565","email":"CW@gmail.com","gender":"M","type":"1","date_signed_up":"2016-06-22 08:31:24","yos":"0"},{"id":"15","name":"CWB","phone":"0706677565","email":"beta@gmail.com","gender":"M","type":"1","date_signed_up":"2016-06-22 08:32:21","yos":"3"},{"id":"16","name":"CWB","phone":"0706677565","email":"beta@gmail.com","gender":"M","type":"1","date_signed_up":"2016-06-22 08:33:58","yos":"3"},{"id":"17","name":"CWB","phone":"0706677565","email":"betqa@gmail.com","gender":"","type":"1","date_signed_up":"2016-06-22 08:48:58","yos":"3"}]}



## Edit Member [/edit_member]

+   parameters

    + api-key (required, string, `'123456'`)
    + action (required, int, `1`) ... Int `action` code(1-update, 0-delete, 2- suspend, 3- transfer).
    + email (string, `'betaclifford@gmail.com`')
    + name (string, `'Clifford Beta'`)
    + phone (string, `'0706677565'`)
    + year_of_study (int, `4`) ...Member year of study.
    + date_signed_up (string, `'2016-06-22 08:32:21'`) ...Date of member sign up.
    + gender (string, `'M'`)
    + type (int, `1`) ... 1- for student, 2-associate,3-visitor.
    + date_of_birth (string, `'1991'`).
    + regno (string, `'EN-273-0628/2013'`).
    + course (string , `'TIE'`).
    + baptismal_status (int, `2`) ... 1-baptised, 2-not baptised.
    + membership (int, `1`) ... 1-Registered member, 2- Sabbath school m
    + password (string, `'12345'`)
    
### Reference [POST]

+ Request (application/json)

{"api-key":"123456","type":"1","action":"1","email":"cbiotivity@gmail.com","gender":"F","name":"ZCB","phone":"0706677565"}

+ Response 200 (application/json)

{"status":"success","message":"User update successful","details":{"old":{"id":"404","name":"BIOTIVITY","phone":"00706677565","email":"cbiotivity@gmail.com","gender":"M","activity":"0","consistency":"0","family":"","status":"1"},"new":{"status":"1","email":"cbiotivity@gmail.com","name":"ZCB","phone":"0706677565","gender":"F"}}}




# Group Department

Contains API creating and retrieving departments.


## Create and retrieve [/departments]

used to create departments and to retrieve department details.


+ parameters

    + api-key (required, string, `'123456'`)
    + command (required, String, `'create'`) ... String `command`, can be `create` or `retrieve`.
    + department (required, String, `'AMR'`) ... String `department` name, required with the create command.
   


### Reference  [POST]

+ Request (application/json)

{"api-key":"123456","department":"AMR","command":"create"}

+ Response 200 (application/json)

{"status":"success","message":"Department Updated"}




# Group Treasury

Contains API calls for the treasury department actions.


## Contributions [/contribution]

used to create contributions and to retrieve contribution details.


+ parameters

    + api-key (required, string, `'123456'`)
    + command (required, String, `'create'`) ... String `command`, can be `create` or `retrieve`.
    + contribution (required, String, `'ALO Uniform'`) ... String `contribution` name, required with the create command.
    + department (required, String, `'3'`) ... String the `deparment id`, required with the create command, 1-Chaplaincy, 2-AMO, 3-ALO,4-PM .


### Reference  [POST]

+ Request (application/json)

{"api-key":"123456","contribution":"ALO Uniform","department":"3","command":"create"}

+ Response 200 (application/json)

{"status":true,"message":"Contribution created"}


+ Request (application/json)

{"api-key":"123456","command":"retrieve"}

+ Response 200 (application/json)

{"status":true,"message":[{"id":"1","did":"0","name":"tithe","status":"1","deparment":null},{"id":"2","did":"0","name":"combined offering","status":"1","deparment":null},{"id":"3","did":"0","name":"church Building","status":"1","deparment":null},{"id":"4","did":"0","name":"camp meeting","status":"1","deparment":null},{"id":"5","did":"4","name":"personal ministries","status":"1","deparment":"PM"}]}   




## Make payments [/malipo]

used to record receipts into the church treasury.

+ parameters

    + api-key (required, string, `'123456'`)
    + id (required, String, `'239'`) ... String `id` of member whose contribution it is.
    + member_type(required, String, `'2'`) .. String `type` of member, 1- student, 2-associate. 
    + contribution (required, String, `'tithe'`) ... String `contribution` code(1-tithe, 2-combined offering, 3- church building, 4- camp meeting, 5-other).
    + amount (required, String, `'1000'`) ... String the `amount` of money given.
    + description (String, `'Sample Description'`) ... String `description` of the contribution.


### Reference  [POST]

+ Request (application/json)

{"api-key":"123456","id":"200","contribution":"1","amount":"500","description":"Combined offering"}

+ Response 200 (application/json)

{"status": "success","message": "Payment Updated"}


    






## Expenditure [/expenditure]

used to enter expenditure records.


+ parameters

    + api-key (required, string, `'123456'`)
    + id (required, String, `4`) ... int `id` of department.
    + amount (required, String, `'500'`) ... String `amount`.
    + description (required, String, `'Bought washing soap'`) ... String the `description`of the expenditure. 


### Reference  [POST]

+ Request (application/json)

{"api-key":"123456","id":"4","amount":"400","description":"Bought washing soap"}

+ Response 200 (application/json)

{"status":true,"message":"Expenditure Updated"}



## Contribution report [/contribution_report]

Used to retrieve contribution records.


+ parameters

    + api-key (required, string, `'123456'`)
    + department_id (int, `4`) ... int `id` of department.
    + member_id ( int,`239`) ... int `id` of member.
    + to (String, `'2016-05-28'`) ... String end `date`.
    + from (String, `'2016-05-28'`) ... String start `date`.


### Reference  [POST]

+ Request (application/json)

{ "api-key":"123456","department_id":"4"}

+ Response 200 (application/json)

{"status":true,"message":[{"id":"1","code":"","member_id":"239","member_type":"0","contribution_id":"1","department_id":"1","contribution_amt":"1000","time_stamp":"2016-06-23 22:51:16","description":"","status":"1"},{"id":"2","code":"","member_id":"239","member_type":"0","contribution_id":"2","department_id":"5","contribution_amt":"1000","time_stamp":"2016-06-23 22:51:22","description":"The Lord's tithe","status":"1"},{"id":"5","code":"","member_id":"239","member_type":"0","contribution_id":"5","department_id":"3","contribution_amt":"1000","time_stamp":"2016-06-23 22:51:27","description":"","status":"1"},{"id":"7","code":"","member_id":"239","member_type":"0","contribution_id":"1","department_id":"3","contribution_amt":"1050","time_stamp":"2016-06-23 22:51:33","description":"Sample","status":"1"},{"id":"9","code":"","member_id":"4","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"500","time_stamp":"2016-06-12 12:23:42","description":"","status":"1"},{"id":"10","code":"","member_id":"3","member_type":"0","contribution_id":"4","department_id":"6","contribution_amt":"400","time_stamp":"2016-06-23 22:51:37","description":"","status":"1"},{"id":"11","code":"","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"400","time_stamp":"2016-06-12 12:30:18","description":"","status":"1"},{"id":"12","code":"jkctr575d3ef326927","member_id":"3","member_type":"0","contribution_id":"4","department_id":"4","contribution_amt":"123","time_stamp":"2016-06-23 22:51:48","description":"","status":"1"},{"id":"13","code":"jkctr575d3f0d62054","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"123","time_stamp":"2016-06-12 13:53:01","description":"","status":"1"},{"id":"14","code":"jkctr575d3f0e81c64","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"123","time_stamp":"2016-06-12 13:53:02","description":"","status":"1"},{"id":"15","code":"jkctr575d3f0f8c880","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"123","time_stamp":"2016-06-12 13:53:03","description":"","status":"1"},{"id":"16","code":"jkctr575d3f1030be4","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"123","time_stamp":"2016-06-12 13:53:04","description":"","status":"1"},{"id":"17","code":"jkctr575d3f10a9d80","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"123","time_stamp":"2016-06-12 13:53:04","description":"","status":"1"},{"id":"18","code":"jkctr575d3f113eeb0","member_id":"3","member_type":"0","contribution_id":"4","department_id":"3","contribution_amt":"123","time_stamp":"2016-06-23 22:51:54","description":"","status":"1"},{"id":"19","code":"jkctr575d3f124353b","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"123","time_stamp":"2016-06-12 13:53:06","description":"","status":"1"},{"id":"20","code":"jkctr575d3f13260ad","member_id":"3","member_type":"0","contribution_id":"4","department_id":"0","contribution_amt":"123","time_stamp":"2016-06-12 13:53:07","description":"","status":"1"},{"id":"21","code":"jkctr575d3f147c7ca","member_id":"3","member_type":"0","contribution_id":"4","department_id":"3","contribution_amt":"123","time_stamp":"2016-06-23 22:52:00","description":"","status":"1"},{"id":"22","code":"jkctr576c4a8a8968c","member_id":"76","member_type":"1","contribution_id":"3","department_id":"0","contribution_amt":"345","time_stamp":"2016-06-23 23:46:02","description":"","status":"1"},{"id":"23","code":"jkctr576c4aafee460","member_id":"76","member_type":"1","contribution_id":"3","department_id":"0","contribution_amt":"345","time_stamp":"2016-06-23 23:46:39","description":"","status":"1"},{"id":"24","code":"jkctr576c4ab18456a","member_id":"76","member_type":"1","contribution_id":"3","department_id":"0","contribution_amt":"345","time_stamp":"2016-06-23 23:46:41","description":"","status":"1"},{"id":"25","code":"jkctr576c4ab26befd","member_id":"76","member_type":"1","contribution_id":"3","department_id":"0","contribution_amt":"345","time_stamp":"2016-06-23 23:46:42","description":"","status":"1"},{"id":"26","code":"jkctr576c4ab376b19","member_id":"76","member_type":"1","contribution_id":"3","department_id":"0","contribution_amt":"345","time_stamp":"2016-06-23 23:46:43","description":"","status":"1"},{"id":"27","code":"jkctr576c4abfeb52b","member_id":"76","member_type":"1","contribution_id":"3","department_id":"0","contribution_amt":"345","time_stamp":"2016-06-23 23:46:55","description":"","status":"1"},{"id":"28","code":"jkctr576c4ace1ac7c","member_id":"76124","member_type":"1","contribution_id":"3","department_id":"0","contribution_amt":"34521341","time_stamp":"2016-06-23 23:47:10","description":"","status":"1"}]}
    


## Expenditure report [/expenditure_report]

Used to retrieve expenditure records.


+ parameters

    + api-key (required, string, `'123456'`)
    + department_id (required, String, `4`) ... int `id` of department.
    + to (String, `'2016-05-28'`) ... String end `date`.
    + from (String, `'2016-05-28'`) ... String start `date`.


### Reference  [POST]

+ Request (application/json)

{"api-key":"123456","department_id":"4"}

+ Response 200 (application/json)

{"status":true,"message":[{"id":"3","code":"jkexp575d40b3267af","department_id":"3","description":"Bought a bunch of bananas","amount":"123","time_stamp":"2016-06-12 14:00:03","status":"1"},{"id":"4","code":"jkexp575d4192ede50","department_id":"3","description":"Bought a bunch of bananas","amount":"123","time_stamp":"2016-06-12 14:03:46","status":"1"}]}



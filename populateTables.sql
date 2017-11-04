-- -----------------------------------------------------------------------------
-- Created by Oscar Avellan
-- -----------------------------------------------------------------------------

INSERT INTO Spatula VALUES(DEFAULT,"Spatula1","Food",'30',"Yellow",5.6,50);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula2","Drugs",'12',"Black",1.5,30);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula3","Paints",'15',"Red",2.0,75);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula4","Plaster",'16',"Green",6,24);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula5","Food",'10',"Blue",0.99,19);

INSERT INTO Spatula VALUES(DEFAULT,"Spatula6","Drugs",'19',"Orange",45,0);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula7","Paints",'40',"Black",8,0);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula8","Food",'17',"Yellow",3.6,0);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula9","Food",'16',"Purple",7.5,0);
INSERT INTO Spatula VALUES(DEFAULT,"Spatula10","Drugs",'9',"Silver",0.99,0);

INSERT INTO `Order` VALUES(DEFAULT,'2016-11-01 11:00:00',"Oscar Avellan","Paul Pogba");
INSERT INTO `Order` VALUES(DEFAULT,'2016-11-02 12:00:00',"Oscar Avellan","Wayne Rooney");
INSERT INTO `Order` VALUES(DEFAULT,'2016-11-03 13:00:00',"Oscar Avellan","Andrea Pirlo");
INSERT INTO `Order` VALUES(DEFAULT,'2016-11-04 14:00:00',"Oscar Avellan","Antonio Valencia");
INSERT INTO `Order` VALUES(DEFAULT,'2016-11-05 15:00:00',"Oscar Avellan","James Rodriguez");


INSERT INTO OrderLineItem VALUES(10,1,5);

INSERT INTO OrderLineItem VALUES(1,2,10);
INSERT INTO OrderLineItem VALUES(9,2,15);

INSERT INTO OrderLineItem VALUES(2,3,7);
INSERT INTO OrderLineItem VALUES(8,3,14);
INSERT INTO OrderLineItem VALUES(3,3,21);

INSERT INTO OrderLineItem VALUES(4,4,6);
INSERT INTO OrderLineItem VALUES(7,4,12);
INSERT INTO OrderLineItem VALUES(5,4,18);
INSERT INTO OrderLineItem VALUES(6,4,24);

INSERT INTO OrderLineItem VALUES(2,5,3);
INSERT INTO OrderLineItem VALUES(4,5,6);
INSERT INTO OrderLineItem VALUES(5,5,9);
INSERT INTO OrderLineItem VALUES(7,5,12);
INSERT INTO OrderLineItem VALUES(9,5,15);

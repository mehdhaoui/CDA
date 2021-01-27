Ma solution est, Si les frais de transports sont deja inclus, de les augmenter a auteur de 10 euros. Si les frais de transports ne sont pas détérminés, il faudra en rajouter pour les commandes dont les clients et fournisseurs ne résident pas dans le meme pays.


CREATE TRIGGER FraisPort AFTER UPDATE ON orderdetails
FOR EACH ROW BEGIN

DECLARE order INT;
DECLARE deliveryprice DECIMAL;
DECLARE cusCountry VARCHAR;
DECLARE supCountry VARCHAR;

SET order = orders details.OrderID;
SET deliveryprice =(SELECT Freight
            from products
            JOIN products on products.ProductID = orderdetails.ProductID
             WHERE orderdetails.OrderID = order);
SET cusCountry =(SELECT Country
                FROM customers
                JOIN orders on OrderID.OrderID = orders details.OrderID
                Join customers on customers.CustomerID =orders.CustomerID
                WHERE orders details.OrderID= order);
SET supCountry = (SELECT Country
                 FROM suppliers
                 JOIN products on products.ProductID = orderdetails.ProductID
                 JOIN suppliers on suppliers.SupplierID = products.SupplierID
                 WHERE orderdetails.OrderID = order);
IF cusCountry != supCountry
THEN
UPDATE orderdetails SET deliveryprice =OLD.Unitprice+10 Where orderdetails.OrderID = order;
END IF;
END;

<?php

abstract class EmailFactory
{
    /**
     * Note that the Creator may also provide some default implementation of the
     * factory method.
     */
    abstract public function create_email($receiver_email,$receiver_name): EmailProduct;

    /**
     * Also note that, despite its name, the Creator's primary responsibility is
     * not creating products. Usually, it contains some core business logic that
     * relies on Product objects, returned by the factory method. Subclasses can
     * indirectly change that business logic by overriding the factory method
     * and returning a different type of product from it.
     */
    public function operate($receiver_email,$receiver_name): EmailProduct
    {
        // Call the factory method to create a Product object.
        $product = $this->create_email($receiver_email,$receiver_name);
        // Now, use the product.
        //$result = "Creator: The same creator's code has just worked with " .
        $product->set_email();

        return $product;
    }
}

/**
 * Concrete Creators override the factory method in order to change the
 * resulting product's type.
 */
class RegisterFactory extends EmailFactory
{
    /**
     * Note that the signature of the method still uses the abstract product
     * type, even though the concrete product is actually returned from the
     * method. This way the Creator can stay independent of concrete product
     * classes.
     */
    public function create_email($receiver_email,$receiver_name): EmailProduct
    {
        return new RegisterEmail($receiver_email,$receiver_name);
    }
}

class ReminderFactory extends EmailFactory
{
    public function create_email($receiver_email,$receiver_name): EmailProduct
    {
        return new ReminderEmail($receiver_email,$receiver_name);
    }
}

class NotificationFactory extends EmailFactory
{
    public function create_email($receiver_email,$receiver_name): EmailProduct
    {
        return new NotificationEmail($receiver_email,$receiver_name);
    }
}

/**
 * The Product interface declares the operations that all concrete products must
 * implement.
 */
abstract class EmailProduct{
protected $receiver_email;
protected $header;
protected $receiver_name;
protected $email_body;
protected $email_subject;
public function __construct($receiver_email,$receiver_name) {
    $this->receiver_email = $receiver_email;
    $this->header = "From: KARAPITIYA DENTAL";
    $this->receiver_name = $receiver_name;
  }
    public abstract function set_email();
    public function get_receiver_email(){
        return $this->receiver_email;
    }
    public function get_receiver_name(){
        return $this->receiver_name;
    }
    public function get_email_body(){
        return $this->email_body;
    }
    public function get_email_header(){
        return $this->header;
    }
    public function get_email_subject(){
        return $this->email_subject;
    }
}

/**
 * Concrete Products provide various implementations of the Product interface.
 */
class RegisterEmail extends EmailProduct
{
    public function set_email()
    {
        $this->email_body="Hi $this->receiver_name,"."\n\n"."        This is from Karapitiya Dental unit. We would like to thank you for registering in our web application. Looking forward to provide you every support we can offer."."\n\n"."Dental Unit,"."\n"."Karapitiya Teaching Hospital.";
        $this->email_subject="Thank you for registernig";
    }
}

class ReminderEmail extends EmailProduct
{
    public function set_email()
    {
        $this->email_body="Hi $this->receiver_name,"."\n\n"."         Hope you are in good health. Our records show that it has been three months from your last visit to the dental clinic. So we hope it is time for you to have a dental checkup. Plese follow our website to add a dental appointment so you can experience our service efficiently. Looking forward to meet you!"."\n\n"."Dental Unit,"."\n"."Karapitiya Teaching Hospital.";
        $this->email_subject="Dental Visit Reminder";
    }
}
class NotificationEmail extends EmailProduct
{
    public function set_email()
    {
        $this->email_body="Hi $this->receiver_name,"."\n\n"."         Hope you are in good health. Our records show that it has been three months from your last visit to the dental clinic. So we hope it is time for you to have a dental checkup. Plese follow our website to add a dental appointment so you can experience our service efficiently. Looking forward to meet you!"."\n\n"."Dental Unit,"."\n"."Karapitiya Teaching Hospital.";
        $this->email_subject="Dental Visit Reminder";
    }
}


class EmailSender{
    protected EmailProduct $email;
    public function __construct($email) { 
        $this->email=$email;
        
    }
    function send_email(){
        $to_email=$this->email->get_receiver_email();
        $subject=$this->email->get_email_subject();
        $body=$this->email->get_email_body();
        $header=$this->email->get_email_header();
        
        mail($to_email, $subject, $body, $header);
    }
}

?>

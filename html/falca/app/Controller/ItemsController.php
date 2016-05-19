<?php

App::import('vendor','myfunc');

class ItemsController extends AppController {
   public $helpers = array('Html', 'Form');

   public $components = array('Auth', 'Session', 'RequestHandler');
  
   public $paginate = array(
                
                    'limit' => 3,                        
                    'order' => array('id' => 'asc'),
					'paramType' => 'querystring',
                
            );

   public function beforeFilter(){//login?????
             $this->Auth->allow();//??????????????????????????
			 $this->Auth->deny('confirm');
        }

   public $uses = array('Item', 'Purchase', 'Profile', 'Favorite', 'Point', 'Date', 'Log', 'Friend', 'Follow');
   
   public function test() {
   
   
   $this->set('datas',$this->paginate());
   
   }

   public function index() {

     $this->layout = 'items-list';

     $user = AuthComponent::user('id');
     $this->set('afters', $this->Item->find('all', array(
         'conditions' => array(
        'whom' => $user,
),
'order' => 'Item.id',
)
));


     }
	 
   public function friend() {

     $this->layout = 'friends-list';

     $user = AuthComponent::user('facebook_id');
     $this->set('friends', $this->Friend->find('all', array(
         'conditions' => array(
        'who' => $user,
)
)
));

$id = AuthComponent::user('id');
$this->set('pairs', $this->Follow->find('all', array(
         'conditions' => array(
        'to_id' => $id,
		'permit' => 1,
)
)
));

$this->set('follows', $this->Follow->find('all', array(
         'conditions' => array(
        'to_id' => $id,
		'permit' => 0,
)
)
));


     }
	 
   public function purchaser($id = null) {
   
   $this->layout = 'purchaser';
   
   $this->set('purchases', $this->Purchase->find('all', array(
         'conditions' => array(
        'Purchase.date_id' => $id,
)
)
));
   
   }

   public function view($id = null) {

    $this->layout = 'item-pre';

    $this->Item->id = $id;
    $this->set('item', $this->Item->read());
	
	$check = $this->Item->find('first', array(
        'conditions' => array('Item.id' => $id)
    ));
	
if(empty($check)) {
        throw new NotFoundException();
    } 
	
$today = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime('-1 day'));
$three = date("Y-m-d", strtotime('-2 day'));
$four = date("Y-m-d", strtotime('-3 day'));
$five = date("Y-m-d", strtotime('-4 day'));
$six = date("Y-m-d", strtotime('-5 day'));
$seven = date("Y-m-d", strtotime('-6 day'));

	
	$this->set('avgtoday', 
$this->Log->find('first', array(
    'conditions' => array('Log.date' => $today), 
    'fields' => array(
       'avg(Log.count) as sumAvg'
    ),
))
);

$this->set('avgyesterday', 
$this->Log->find('first', array(
    'conditions' => array('Log.date' => $yesterday), 
    'fields' => array(
       'avg(Log.count) as sumAvg'
    ),
))
);

$this->set('avgthree', 
$this->Log->find('first', array(
    'conditions' => array('Log.date' => $three), 
    'fields' => array(
       'avg(Log.count) as sumAvg'
    ),
))
);

$this->set('avgfour', 
$this->Log->find('first', array(
    'conditions' => array('Log.date' => $four), 
    'fields' => array(
       'avg(Log.count) as sumAvg'
    ),
))
);

$this->set('avgfive', 
$this->Log->find('first', array(
    'conditions' => array('Log.date' => $five), 
    'fields' => array(
       'avg(Log.count) as sumAvg'
    ),
))
);

$this->set('avgsix', 
$this->Log->find('first', array(
    'conditions' => array('Log.date' => $six), 
    'fields' => array(
       'avg(Log.count) as sumAvg'
    ),
))
);

$this->set('avgseven', 
$this->Log->find('first', array(
    'conditions' => array('Log.date' => $seven), 
    'fields' => array(
       'avg(Log.count) as sumAvg'
    ),
))
);
	
	$this->set('logs', $this->Log->find('all', array(
         'conditions' => array(
        'Log.item_id' => $id,
)
)
));

	
	$this->set('purchases', $this->Purchase->find('all', array(
         'conditions' => array(
        'Purchase.item_id' => $id,
)
)
));



     $this->set('dates', $this->Date->find('all', array(
         'conditions' => array(
        'item_id' => $id,
),
)
)
);

    $this->set('itemid', $id);
     }

  public function add() {

     $this->layout = 'item-add';

     if ($this->request->is('post')) {
        if ($this->Item->save($this->request->data)) {
            $this->Session->setFlash('レッスンを登録しました。', 'default', array('class' => 'setflash'));
            $this->redirect(array('action'=>'index'));
        } else {
            $this->Session->setFlash('Failed!');
        }
        }
        }
		
	public function confirm() {

     $this->layout = 'purch-confirm';

    
        }
		
	public function thanks() {

     $this->layout = 'purch-thanks';

    
        }
		

		

   public function edit($id = null) {

     $this->layout = 'item-edit';
	 
	 
	 $this->set('purchase', $this->Purchase->find('first', array(
         'conditions' => array(
        'Purchase.item_id' => $id,
)
)
));
	 
	 $this->Item->validate = array(
        'title' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢タイトル｣は必ず記入して下さい。',
        ),
		'content' => array(
            'rule' => 'notEmpty', 
            'required' => true, 
            'message' => '｢内容｣は必ず記入して下さい。',
        )
    );

    $this->set('item', $this->Item->find('first', array(
         'conditions' => array('Item.id' => $id)
)));

$check = $this->Item->find('first', array(
        'conditions' => array('Item.id' => $id)
    ));
	
if(empty($check)) {
        throw new NotFoundException();
    } 

     $this->Item->id = $id;
     if ($this->request->is('get')) {
         $this->request->data = $this->Item->read();
     } else { 
         if ($this->Item->save($this->request->data)) {
            $this->Session->setFlash('レッスンを編集しました。', 'default', array('class' => 'setflash'));
            $this->redirect(array('action'=>'index'));
        } else {
            $this->Session->setFlash('Failed!');
        }
		}
		
        }


   public function delete($id) {
   
   if ($this->request->is('get')) {
         throw new MethodNotAllowedException();
         }
         if ($this->Item->delete($id)) {
             $this->Session->setFlash('レッスンを削除しました。', 'default', array('class' => 'setflash'));
             $this->redirect(array('action'=>'index'));     
         }
		 
      }       

 public function maps() {

     $this->layout = 'maps-new3';

$lat = $this->request->query['lat'];
$lng = $this->request->query['lng'];
$purp = $this->request->query['purp'];

if($purp == 'all'){

$conditions = array(
        'Item.lat >=' => $lat - 1,
        'Item.lat <=' => $lat + 1,
        'Item.lng >=' => $lng - 1,
        'Item.lng <=' => $lng + 1,
    );
	
}else{	

$conditions = array(
        'Item.lat >=' => $lat - 1,
        'Item.lat <=' => $lat + 1,
        'Item.lng >=' => $lng - 1,
        'Item.lng <=' => $lng + 1,
        'Item.purpose =' => $purp ,
    );
	
}	
        
        $this->set('items', $this->paginate($conditions));
		

     }

   public function search() {

     $this->set('items', $this->Item->find('all'));
     
     }


   public function sale() {

     $this->layout = 'sale';

     $user = AuthComponent::user('id');

     $this->set('dates', 
$this->Date->find('all', array(
    'conditions' => array('Date.user_id' => $user)
))
);     
     }

   public function dashboard() {

     $this->layout = 'dashboard';
	 
	 $user = AuthComponent::user('id');
	 
	 
	 $this->set('purchases', $this->Purchase->find('all', array(
         'conditions' => array(
        'Purchase.user_id' => $user,
        'Date.date >=' => date('Y-m-d'),
),
'order' => 'Date.date',
)
));
	 
$this->set('sum', 
$this->Point->find('first', array(
    'conditions' => array('Point.user_id' => $user), 
    'fields' => array(
       'sum(Point.point) as sumPoint'
    ),
))
);


}

   public function trainer_dashboard() {

     $this->layout = 'trainer-dashboard';
	 
     $user = AuthComponent::user('id');
	 
	 
	 $this->set('afters', $this->Item->find('all', array(
         'conditions' => array(
        'whom' => $user,
        'Item.date >=' => date('Y-m-d'),
),
'order' => 'date',
)
));

      $this->set('dates', $this->Date->find('all', array(
         'conditions' => array(
        'Item.whom' => $user,
        'Date.date >=' => date('Y-m-d'),
),
'order' => 'Date.date',
)
));

     


}

   public function json($id = null) {
   
   $this->set('dates', 
$this->Date->find('all', array(
    'conditions' => array('Date.item_id' => $id), 
))
);

$this->viewClass = 'Json';
$this->set(compact('dates'));
$this->set('_serialize','dates');
   
}   

   public function detail($id = null) {

     $this->layout = 'item-detail2';
	 
	 $user = AuthComponent::user('id');

    $this->set('item', $this->Item->find('first', array(
         'conditions' => array('Item.id' => $id)
)));

$check = $this->Item->find('first', array(
        'conditions' => array('Item.id' => $id)
    ));
	
if(empty($check)) {
        throw new NotFoundException();
    } 

 $this->set('favorite', $this->Favorite->find('first', array(
		 'conditions' => array('user_id' => $user, 'item_id' => $id)
)));



$conditions = array(
        'Purchase.item_id' => $id,
        'Purchase.check' => 1
    );
        
        $this->set('purchases', $this->paginate('Purchase', $conditions));



     $this->set('avg', 
$this->Purchase->find('first', array(
    'conditions' => array('Purchase.item_id' => $id, 'Purchase.check' => 1), 
    'fields' => array(
       'avg(Purchase.fun) as avgFun'
    ),
))
);

     $this->set('sum', 
$this->Purchase->find('first', array(
    'conditions' => array('Purchase.item_id' => $id), 
    'fields' => array(
       'sum(Purchase.quantity) as sumQuantity'
    ),
))
);

     $this->set('dates', 
$this->Date->find('all', array(
    'conditions' => array('Date.item_id' => $id), 
))
);

     
     $this->set('profile', $this->Profile->find('first', array(
         'conditions' => array('id' => $id)
)));

     $this->set('itemid', $id);

     }

 public function buy() {

App::uses('paypal-digital-goods', 'Vendor');
App::uses('paypal-subscription', 'Vendor');
App::uses('paypal-purchase', 'Vendor');

$this->set_credentials();
$this->create_example_purchase();
$this->create_example_subscription();
$this->get_script_uri( $script = 'index.php' );

     }

 public function top() {

     $this->layout = 'top';


     }


/**
 * Get the PayPal Digital Goods class definitions from the PayPal Digital Goods PHP Library.
 */



/**
 * A central function for settings the credentials for both subscription & purchase 
 * objects with the PayPal_Digital_Goods_Configuration registry class.
 */
function set_credentials() {

App::uses('paypal-digital-goods', 'Vendor');
App::uses('paypal-subscription', 'Vendor');
App::uses('paypal-purchase', 'Vendor');


	/*
	PayPal_Digital_Goods_Configuration::username( 'your_api_username' );
	PayPal_Digital_Goods_Configuration::password( 'your_api_password' );
	PayPal_Digital_Goods_Configuration::signature( 'your_api_signature' );
	*/

	PayPal_Digital_Goods_Configuration::username( 'digita_1308916325_biz_api1.gmail.com' );
	PayPal_Digital_Goods_Configuration::password( '1308916362' );
	PayPal_Digital_Goods_Configuration::signature( 'AFnwAcqRkyW0yPYgkjqTkIGqPbSfAyVFbnFAjXCRltVZFzlJyi2.HbxW' );

	PayPal_Digital_Goods_Configuration::return_url( get_script_uri( 'return.php?paypal=paid' ) );
	PayPal_Digital_Goods_Configuration::cancel_url( get_script_uri( 'return.php?paypal=cancel' ) );
	PayPal_Digital_Goods_Configuration::business_name( 'Demo Store' );

	PayPal_Digital_Goods_Configuration::notify_url( get_script_uri( 'return.php?paypal=notify' ) );

	// Uncomment the line below to switch to the live PayPal site
	//PayPal_Digital_Goods_Configuration::environment( 'live' );

	if( PayPal_Digital_Goods_Configuration::username() == 'your_api_username' || PayPal_Digital_Goods_Configuration::password() == 'your_api_password' || PayPal_Digital_Goods_Configuration::signature() == 'your_api_signature' )
		exit( 'You must set your API credentials in ' . __FILE__ . ' for this example to work.' );
}


/**
 * Creates and returns a PayPal DG Purchase Object
 */
function create_example_purchase() {

	set_credentials();

	$purchase_details = array(
		'name'        => 'Digital Good Purchase Example',
		'description' => 'Example Digital Good Purchase',
		'amount'      => '15.50',
		'tax_amount'  => '2.50',
		'items'       => array(
			array( // First item
				'item_name'        => 'First item name',
				'item_description' => 'This is a description of the first item in the cart, it costs $9.00',
				'item_amount'      => '10.00',
				'item_tax'         => '1.00',
				'item_quantity'    => 1,
				'item_number'      => 'XF100',
			),
			array( // Second item
				'item_name'        => 'Second Item',
				'item_description' => 'This is a description of the SECOND item in the cart, it costs $1.00 but there are 3 of them.',
				'item_amount'      => '1.00',
				'item_tax'         => '0.50',
				'item_quantity'    => 3,
				'item_number'      => 'XJ100',
			),
		)
	);

	return new PayPal_Purchase( $purchase_details );
}


/**
 * Creates and returns a PayPal DG Subscription Object
 */
function create_example_subscription() {

	set_credentials();

	$subscription_details = array(
		'description'        => 'Example Subscription: $10 sign-up fee then $2/week for the next four weeks.',
		'initial_amount'     => '10.00',
		'amount'             => '2.00',
		'period'             => 'Week',
		'frequency'          => '1', 
		'total_cycles'       => '4',
	);

	return new PayPal_Subscription( $subscription_details );
}


/**
 * Helper function to get the URI for the script
 */
function get_script_uri( $script = 'index.php' ){
	// IIS Fix
	if( empty( $_SERVER['REQUEST_URI'] ) )
		$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];

	// Strip off query string
	$url = preg_replace( '/\?.*$/', '', $_SERVER['REQUEST_URI'] );
	//$url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'/';
	$url = 'http://'.$_SERVER['HTTP_HOST'].implode( '/', ( explode( '/', $_SERVER['REQUEST_URI'], -1 ) ) ) . '/';

	return $url . $script;
}


}
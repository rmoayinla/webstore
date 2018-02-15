<?php
/**
 * A simple hook that runs before CI system starts
 *
 * this hook connects to the db and fetching routes 
 * this routes are added to routes.php 
 * its always better loading routes from the db as it can be easier managed
 *@category: hooks 
 *@package: webstore 
 *
 */

//var that holds routes stored in the db //
global $DB_Routes;

class Router_Hook{

	/**
	 * Get routes from database using PDO 
	 *
	 *@param: $params 		(array)		database configurations and settings 
	 *@return: $results 	(array)		array of routes stored in the database 
	 *
	 */
	public function get_routes($params){
		global $DB_Routes;

		try{
			$db = new PDO($params['dsn'], $params['username'], $params['password'], array(PDO::ATTR_PERSISTENT => true));
			$sql = "SELECT ID, name, value, category FROM {$params['dbprefix']}settings WHERE category = ?";
			$query = $db->prepare($sql);
			$query->bindValue(1, "routes");
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			if(empty($results)){
				$DB_Routes = [];
				return;
			}
			foreach($results as $route){
				$DB_Routes[$route["name"]] = $route["value"];
			}
			
		}
		catch(PDOException $e){
			throw new Exception( sprintf('Unable to load routes from database. message:%s', $e->getMessage()) );
		}
	}	
}
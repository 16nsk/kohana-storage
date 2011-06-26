<?php defined('SYSPATH') OR die('Kohana bootstrap needs to be included before tests run');
/**
 * Tests Storage
 *
 * @package		Storage
 * @category	Tests
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011 Micheal Morgan
 * @license		MIT
 */
class Kohana_Storage_S3Test extends Kohana_StorageTest
{	
	/**
	 * Verify internet and S3 has required configuration
	 * 
	 * @access	protected
	 * @return	void
	 */
	public function setUp()
    {
    	parent::setUp();
    	
    	$config = Kohana::config('storage.s3');
    	
        if ( ! $this->hasInternet() || ! $config['key'] || ! $config['secret_key'] || ! $config['bucket'])
        {
            $this->markTestSkipped('Storage S3 driver is not configured.');
        }
    }
    
    /**
     * Factory using S3 configuration
     * 
     * @access	public
     * @return	Storage_S3
     */
    public function factory()
    {
    	return Storage::factory('s3');
    }
}
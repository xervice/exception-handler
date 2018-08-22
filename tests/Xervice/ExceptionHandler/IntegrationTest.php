<?php
namespace XerviceTest\ExceptionHandler;

use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;

require __DIR__ . '/TestInjector/ExceptionHandlerDependencyProvider.php';

/**
 * @method \Xervice\ExceptionHandler\Business\ExceptionHandlerFacade getFacade()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

    /**
     * @group Xervice
     * @group ExceptionHandler
     * @group Integration
     */
    public function testRegisterHandler()
    {
        ob_start();
        $this->getFacade()->registerExceptionHandler();
        $content = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            'REGISTER',
            $content
        );
    }

    /**
     * @group Xervice
     * @group ExceptionHandler
     * @group Integration
     */
    public function testHandleException()
    {
        ob_start();
        $this->getFacade()->handleException(new \Exception('Test'));
        $content = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            'Test',
            $content
        );
    }
}
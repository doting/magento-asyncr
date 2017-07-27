# Magento Asyncr
Simplest way to use cron schedule mechanism as a async event processor.

It uses the default Magento cron schedule system (```cron_schedule``` table) to store jobs.

Create a job:
```php
Mage::getModel('asyncr/job')
    ->setName('update_product_slow_service')
    ->setPayload(['productId' => $product->getEntityId()]);
```
The job name must match some cron job in some module config.xml:
```xml
<config>
    <crontab>
        <jobs>
            <update_product_slow_service>
                <!-- no need for schedule tag -->
                <run>
                    <!-- model name or method is your call ;) -->
                    <model>your_module/yourjobprocessorclass::run</model>
                </run>
            </update_product_slow_service>
        </jobs>
    </crontab>
</config>
```
The created job will run on next cron execution.

Credits: https://stackoverflow.com/questions/29912459/trigger-magento-event-observer-asynchronously
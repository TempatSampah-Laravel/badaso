<?php

namespace Uasoft\Badaso\OrchestratorHandlers;

use Uasoft\Badaso\ContentManager\FileGenerator;
use Uasoft\Badaso\Events\BreadChanged;
use Uasoft\Badaso\Models\Permission;

class BreadDeletedHandler
{
    /** @var FileGenerator */
    private $file_generator;

    /**
     * BadasoDeleted constructor.
     *
     * @param FilesGenerator $file_generator
     */
    public function __construct(FileGenerator $file_generator)
    {
        \Log::debug(get_class($this));
        $this->file_generator = $file_generator;
    }

    /**
     * Bread Deleted Handler.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle(BreadChanged $bread_changed): bool
    {
        $data_type = $bread_changed->data_type;

        $data_type->destroy($data_type->id);

        if (!is_null($data_type)) {
            Permission::removeFrom($data_type->name);
        }

        // Finally, We can delete seed files.
        $this->file_generator->deleteSeedFiles($data_type);

        // After deleting seeds file, we create new seed file in order to rollback
        // the seeded data.
        return $this->file_generator->generateSeedFileForDeletedData($data_type);
    }
}

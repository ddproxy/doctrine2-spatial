<?php
namespace DDProxy\Spatial\PHP\Types\Geography;

/**
 * Geography interface for Geography objects
 */
interface GeographyInterface
{
    const GEOGRAPHY = 'Geography';

    /**
     * @return int
     */
    public function getSrid();

    /**
     * @param int $srid
     *
     * @return self
     */
    public function setSrid($srid);

    /**
     * @return string
     */
    public function getType();
}

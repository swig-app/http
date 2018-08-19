<?php

namespace Swig\Http\Status;

/**
 * Class Check
 *
 * @package \Swig\Http\Status
 */
class Check extends \Swig\Http\Base\Check
{
    public function is(int $number)
    {
        return  $this->response->original()->getStatusCode() == $number;
    }

    public function inRange(int $from, int $to)
    {
        return  $this->response->original()->getStatusCode() >= $from &&  $this->response->original()->getStatusCode() <= $to;
    }

    public function isInformational()
    {
        return $this->inRange(100, 102);
    }

    public function isSuccessful()
    {
        $statuses = array_merge(range(200, 208), [226]);

        return in_array( $this->response->original()->getStatusCode(), $statuses);
    }

    public function isRedirection()
    {
        $statuses = array_merge(range(300, 305), [307, 308]);

        return in_array( $this->response->original()->getStatusCode(), $statuses);
    }

    public function isClientError()
    {
        $statuses = array_merge(range(400, 418), range(421, 424), [426, 428, 429, 431, 444, 451, 499]);

        return in_array( $this->response->original()->getStatusCode(), $statuses);
    }

    public function isServerError()
    {
        $statuses = array_merge(range(500, 508), [510, 511, 599]);

        return in_array( $this->response->original()->getStatusCode(), $statuses);
    }
}

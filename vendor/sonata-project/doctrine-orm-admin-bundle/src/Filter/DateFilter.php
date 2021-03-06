<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\DoctrineORMAdminBundle\Filter;

use Symfony\Component\Form\Extension\Core\Type\DateType;

final class DateFilter extends AbstractDateFilter
{
    /**
     * This filter has no range.
     *
     * @var bool
     */
    protected $range = false;

    /**
     * This filter does not allow filtering by time.
     *
     * @var bool
     */
    protected $time = false;

    public function getDefaultOptions(): array
    {
        return ['field_type' => DateType::class];
    }
}

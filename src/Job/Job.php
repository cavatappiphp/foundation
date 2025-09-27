<?php

namespace Cavatappi\Foundation\Job;

use Cavatappi\Foundation\Value;

/**
 * A Job represents a task that should be performed asynchronously.
 *
 * A job can be routed to any method on any service. Realistically, it should be a service in a dependency injection
 * container. Additional properties will be passed as parameters; override `getParameters` to change this.
 *
 * Extend this class and add any needed information. Jobs will likely be serialized to facilitate cross-thread or
 * cross-server communication.
 */
interface Job extends Value {
	/**
	 * Service to instantiate.
	 *
	 * @var class-string $service
	 */
	public string $service { get; }

	/**
	 * Method on $service to call.
	 *
	 * @var string
	 */
	public string $method { get; }

	/**
	 * Get the parameters to be passed to $service->$method.
	 *
	 * @return array
	 */
	public function getParameters(): array;
}

﻿.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _faq:

FAQ
===

Why do you not include a nice CSS stylesheet?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Because you normally customize templates/stylesheets to your needs. Therefore the
extension just comes with a rudementary CSS stylesheet available in
EXT:Resources/Public/Css/events_default.css which must be included manually like
shown below::

	page.includeCSS {
		events = EXT:Resources/Public/Css/events_default.css
	}

Is it possible to extend events/registrations with own fields?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

I have created a demo extension, which shows how to add new fields to the event and registration
domain model.

Demo Extension: https://github.com/derhansen/sf_event_mgt_extend_demo

The extension contains a short manual (README.md) how to add your own fields to existing domain models.

How do I export registered participants to a CSV file?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Please use the CSV export action as described in :ref:`backend-module` section.

How do I create a custom e-mail notification?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

A detailled description can be found in the :ref:`custom-notifications` section.

Can I add the HMAC or an appended HMAC of the registration UID to e-mails?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Yes, you can use the following objects in you e-mail templates

* {hmac} = HMAC of uid
* {reghmac} = appended uid+HMAC

Is it possible to filter by categories in the listview
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Yes, filtering of events by a category is possible if you pass the category to the listview.::

  <f:link.action action="list" controller="Event" arguments="{category: '{category.uid}'}">{category.title}</f:link.action>

This only works, if you create links with f:link.action as shown above. If you want to display the
categories in a select-box, then I suggest you create a CSS only select box (e.g. UL menu)

When does {event.registrationPossible} return TRUE
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

For each event, the attribute registrationPossible returns TRUE or FALSE, if registration for
the event is possible. TRUE is returned, when all conditions below are

* Registration option is activated for the event
* Max participants is not reached (if max. participants > 0)
* Date set at registration deadline ist not reached
* Startdate of event is not reached

How can I disable double opt in for event registration?
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

You can enable autoConfirmation for new registrations as described in the :ref:`tsref` section.
With autoConfirmation enabled, new registrations will automatically be confirmed and the user
will not receive a confirmation e-mail.

How does the simultaneous registration process work
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

If the field "Max. simultaneous registrations per user" is set to a value greater than 1 for the given
event, a user is able to create multiple registrations at once. If the user in the registration view
chooses to create more than one registration, there will be created the given amount of registrations
in the backend for the user. All fields (e.g. firstname, lastname, email) will contain the same values.

The first registration saved is the "main registration", and all other registrations saved later will
depend on the "main registration". All "dependent registrations" will automatically get the option
"No e-mail notifications" set to true, so custom notifications are only sent to the e-mail address
of the "main registration".

If automatic confirmation is turned off (default), the user has to confirm the registration by clicking
a link in the confirmation e-mail. When the user confirms the registration, all "dependent registrations"
of the "main registration will automatically also be confirmed.



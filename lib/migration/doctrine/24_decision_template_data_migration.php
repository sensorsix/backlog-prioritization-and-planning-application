<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DecisionTemplateDataMigration extends Doctrine_Migration_Base
{
    public function up()
    {
      /** @var DecisionType $typeTable  */
      $typeTable = Doctrine::getTable('DecisionType');

      /** @var DecisionType $generic  */
      $generic = $typeTable->find(1);

      $template = new TypeTemplate();
      $template->name = 'Default';
      $template->alternative_alias = 'Alternative';
      $template->alternative_plural_alias = 'Alternatives';
      $template->partitioner_alias = 'Partition';
      $generic->TypeTemplate->add($template);
      $generic->save();

      /** @var DecisionType $productDevelopment  */
      $productDevelopment = $typeTable->find(2);
      $template = new TypeTemplate();
      $template->name = 'Default';
      $template->alternative_alias = 'Product feature';
      $template->alternative_plural_alias = 'Product features';
      $template->partitioner_alias = 'Release';
      $productDevelopment->TypeTemplate->add($template);

      // Scrum
      $template = new TypeTemplate();
      $template->name = 'Scrum';
      $template->alternative_alias = 'Userstories';
      $template->alternative_plural_alias = 'Userstories';
      $template->partitioner_alias = 'Sprint';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Storypoints';
      $criteriaTemplate->measurement = 'direct rating';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Priority';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $roleTemplate = new RoleTemplate();
      $roleTemplate->name = 'Product owner';
      $template->RoleTemplate->add($roleTemplate);

      $productDevelopment->TypeTemplate->add($template);
      // End Scrum

      // Traditional
      $template = new TypeTemplate();
      $template->name = 'Traditional';
      $template->alternative_alias = 'Product features';
      $template->alternative_plural_alias = 'Product features';
      $template->partitioner_alias = 'Release';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Customer value';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Feasibility';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Hour estimate';
      $criteriaTemplate->measurement = 'direct rating';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $roleTemplate = new RoleTemplate();
      $roleTemplate->name = 'Customer';
      $template->RoleTemplate->add($roleTemplate);

      $roleTemplate = new RoleTemplate();
      $roleTemplate->name = 'Developer';
      $template->RoleTemplate->add($roleTemplate);

      $productDevelopment->TypeTemplate->add($template);
      // End Traditional

      // Persona Analysis
      $template = new TypeTemplate();
      $template->name = 'Persona Analysis';
      $template->alternative_alias = 'Product features';
      $template->alternative_plural_alias = 'Product features';
      $template->partitioner_alias = 'Release';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Value for persona 1';
      $criteriaTemplate->measurement = 'ten point scale';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Value for persona 2';
      $criteriaTemplate->measurement = 'ten point scale';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Value for persona 3';
      $criteriaTemplate->measurement = 'ten point scale';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Hour estimate';
      $criteriaTemplate->measurement = 'direct rating';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $roleTemplate = new RoleTemplate();
      $roleTemplate->name = 'Analyst';
      $template->RoleTemplate->add($roleTemplate);

      $roleTemplate = new RoleTemplate();
      $roleTemplate->name = 'Developer';
      $template->RoleTemplate->add($roleTemplate);

      $productDevelopment->TypeTemplate->add($template);
      // End Persona Analysis

      $productDevelopment->save();

      /** @var DecisionType $vendorSelection  */
      $vendorSelection = $typeTable->find(3);
      $vendorSelection->name = 'Supplier selection';

      $template = new TypeTemplate();
      $template->name = 'Default';
      $template->alternative_alias = 'Supplier';
      $template->alternative_plural_alias = 'Suppliers';

      $vendorSelection->TypeTemplate->add($template);

      // Vendor selection
      $template = new TypeTemplate();
      $template->name = 'Vendor selection';
      $template->alternative_alias = 'Vendor';
      $template->alternative_plural_alias = 'Vendors';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Functionality';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Integration';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Low risk';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Strategic alignment';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Implementation';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Operation';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Total cost';
      $criteriaTemplate->measurement = 'direct rating';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $vendorSelection->TypeTemplate->add($template);
      // End Vendor selection

      // Partner selection
      $template = new TypeTemplate();
      $template->name = 'Partner selection';
      $template->alternative_alias = 'Partner ';
      $template->alternative_plural_alias = 'Partners';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Strategic match';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Cultural fit';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Experience';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Cost';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);
      $vendorSelection->TypeTemplate->add($template);

      $vendorSelection->save();

      /** @var DecisionType $projectPortfolio  */
      $projectPortfolio = $typeTable->find(4);

      $template = new TypeTemplate();
      $template->name = 'Default';
      $template->alternative_alias = 'Item';
      $template->alternative_plural_alias = 'Items';
      $template->partitioner_alias = 'Portfolio';

      $projectPortfolio->TypeTemplate->add($template);

      // Projects Portfolio Management
      $template = new TypeTemplate();
      $template->name = 'Projects Portfolio Management';
      $template->alternative_alias = 'Projects';
      $template->alternative_plural_alias = 'Projects';
      $template->partitioner_alias = 'Program';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Strategic alignment';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Complexity';
      $criteriaTemplate->variable_type = 'Info';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Risk';
      $criteriaTemplate->variable_type = 'Info';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Cost';
      $criteriaTemplate->measurement = 'direct rating';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $projectPortfolio->TypeTemplate->add($template);
      // End Projects Portfolio Management

      // Application Portfolio Management
      $template = new TypeTemplate();
      $template->name = 'Application Portfolio Management';
      $template->alternative_alias = 'Application';
      $template->alternative_plural_alias = 'Applications';
      $template->partitioner_alias = 'Portfolio';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Functional quality';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Business value';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Cost';
      $criteriaTemplate->measurement = 'direct rating';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $projectPortfolio->TypeTemplate->add($template);
      // End Application Portfolio Management

      $template = new TypeTemplate();
      $template->name = 'Product Portfolio Management';
      $template->alternative_alias = 'Product';
      $template->alternative_plural_alias = 'Products';
      $template->partitioner_alias = 'Product line';

      $projectPortfolio->TypeTemplate->add($template);

      $projectPortfolio->save();

      /** @var DecisionType $recruitment  */
      $recruitment = $typeTable->find(5);

      $template = new TypeTemplate();
      $template->name = 'Default';
      $template->alternative_alias = 'Candidate';
      $template->alternative_plural_alias = 'Candidates';
      $template->partitioner_alias = 'Short list';

      $recruitment->TypeTemplate->add($template);

      // New position
      $template = new TypeTemplate();
      $template->name = 'New position';
      $template->alternative_alias = 'Candidate';
      $template->alternative_plural_alias = 'Candidates';
      $template->partitioner_alias = 'Short list';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Relevant skills';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Personality';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $recruitment->TypeTemplate->add($template);
      // End New position

      // Team formation
      $template = new TypeTemplate();
      $template->name = 'Team formation';
      $template->alternative_alias = 'Candidate';
      $template->alternative_plural_alias = 'Candidates';
      $template->partitioner_alias = 'Team';

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Availability';
      $criteriaTemplate->measurement = 'direct rating';
      $criteriaTemplate->variable_type = 'Cost';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $criteriaTemplate = new CriteriaTemplate();
      $criteriaTemplate->name = 'Experience';
      $template->CriteriaTemplate->add($criteriaTemplate);

      $recruitment->TypeTemplate->add($template);
      // End Team formation

      $recruitment->save();
    }

    public function down()
    {
    }
}